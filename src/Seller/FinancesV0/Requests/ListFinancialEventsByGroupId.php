<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\RequestGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FinancesV0\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FinancesV0\Responses\ListFinancialEventsResponse;

/**
 * listFinancialEventsByGroupId
 */
class ListFinancialEventsByGroupId extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $eventGroupId  The identifier of the financial event group to which the events belong.
     * @param  ?int  $maxResultsPerPage  The maximum number of results to return per page. If the response exceeds the maximum number of transactions or 10 MB, the API responds with 'InvalidInput'.
     * @param  ?\DateTimeInterface  $postedAfter  A date used for selecting financial events posted after (or at) a specified time. The date-time **must** be more than two minutes before the time of the request, in [ISO 8601](https://developer-docs.amazon.com/sp-api/docs/iso-8601) date time format.
     * @param  ?\DateTimeInterface  $postedBefore  A date used for selecting financial events posted before (but not at) a specified time. The date-time must be later than `PostedAfter` and no later than two minutes before the request was submitted, in [ISO 8601](https://developer-docs.amazon.com/sp-api/docs/iso-8601) date time format. If `PostedAfter` and `PostedBefore` are more than 180 days apart, no financial events are returned. You must specify the `PostedAfter` parameter if you specify the `PostedBefore` parameter. Default: Now minus two minutes.
     * @param  ?string  $nextToken  A string token returned in the response of your previous request.
     */
    public function __construct(
        protected string $eventGroupId,
        protected ?int $maxResultsPerPage = null,
        protected ?\DateTimeInterface $postedAfter = null,
        protected ?\DateTimeInterface $postedBefore = null,
        protected ?string $nextToken = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/finances/v0/financialEventGroups/{$this->eventGroupId}/financialEvents";
    }

    public function createDtoFromResponse(Response $response): ListFinancialEventsResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200, 400, 403, 404, 429, 500, 503 => ListFinancialEventsResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'MaxResultsPerPage' => $this->maxResultsPerPage,
            'PostedAfter' => $this->postedAfter?->format('Y-m-d\TH:i:s\Z'),
            'PostedBefore' => $this->postedBefore?->format('Y-m-d\TH:i:s\Z'),
            'NextToken' => $this->nextToken,
        ]);
    }
}
