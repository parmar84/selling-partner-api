<?php

declare(strict_types=1);

namespace SellingPartnerApi\Generator\Schema;

use GuzzleHttp\Client;
use SellingPartnerApi\Generator\Generator;
use SellingPartnerApi\Generator\Package;
use SellingPartnerApi\Generator\Schema;
use voku\helper\HtmlDomParser;

class SchemaVersion
{
    public function __construct(
        public Schema $schema,
        public string $url,
        public string $version,
        public bool $latest = false,
        public bool $deprecated = false,
        public ?string $selector = null,
    ) {
    }

    /**
     * Generate the code for this version of this schema.
     */
    public function generate(): void
    {
        $baseNamespace = Package::namespace();
        $categoryNamespace = ucfirst($this->schema->category->value);
        $schemaNamespace = str_replace(' ', '', $this->schema->name).'V'.$this->version;

        $inputPath = $this->path();
        $generator = Generator::make([
            'namespace' => "$baseNamespace\\$categoryNamespace\\$schemaNamespace",
            'outputDir' => "src/$categoryNamespace/$schemaNamespace",
        ]);
        $result = $generator->run($inputPath);
        $result->dumpFiles();
    }

    public function refactor(): void
    {
        $schema = json_decode(file_get_contents($this->path(true)));

        foreach ($schema->paths as $path => $operations) {
            foreach ($operations as $method => $operation) {
                // Standardize tags
                $operation->tags = [ucfirst($this->schema->name).'V'.$this->version];

                foreach ($operation->responses as $code => $response) {
                    $content = [];
                    foreach ($response->content as $contentType => $mediaType) {
                        // Sometimes Amazon puts response payload examples in the response content list,
                        // which is not valid OpenAPI spec. This regex will have some false positives, but
                        // it should be fine for our purposes.
                        $regex = '/^(application|audio|image|message|multipart|text|video)\/.+$/';
                        if (! preg_match($regex, $contentType)) {
                            continue;
                        }
                        $content[$contentType] = $mediaType;
                    }
                    $response->content = $content;
                    $operation->responses->{$code} = $response;
                }
                $operations->{$method} = $operation;
            }
            $schema->paths->{$path} = $operations;
        }

        file_put_contents(
            $this->path(),
            json_encode($schema, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Download the schema, converting it from Swagger 2.0 to OpenAPI 3.0 in the process.
     */
    public function download(): void
    {
        $client = new Client();
        $convertUrl = 'https://converter.swagger.io/api/convert';

        if ($this->selector !== null) {
            $fullPage = $client->get($this->url);
            $html = HtmlDomParser::str_get_html($fullPage->getBody()->getContents());
            $rawSchemaData = $html->findOne($this->selector)->text();
            $originalJson = json_decode(html_entity_decode($rawSchemaData));

            $res = $client->post($convertUrl, [
                'json' => $originalJson,
            ]);
        } else {
            $res = $client->get($convertUrl, [
                'query' => ['url' => $this->url],
            ]);
        }
        $json = json_decode($res->getBody()->getContents());

        file_put_contents(
            $this->path(true),
            json_encode($json, JSON_PRETTY_PRINT)
        );
    }

    /**
     * Get the path for this schema version.
     *
     * @param  bool  $upstream  If true, return the path where original Amazon schemas are stored.
     */
    public function path(bool $upstream = false): string
    {
        return "{$this->schema->path($upstream)}/v{$this->version}.json";
    }
}
