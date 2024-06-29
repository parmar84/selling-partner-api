<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\OrdersV1\Dto;

use SellingPartnerApi\Dto;

final class TaxRegistrationDetails extends Dto
{
    /**
     * @param  string  $taxRegistrationType  Tax registration type for the entity.
     * @param  string  $taxRegistrationNumber  Tax registration number for the entity. For example, `VAT ID`.
     */
    public function __construct(
        public readonly string $taxRegistrationType,
        public readonly string $taxRegistrationNumber,
    ) {}
}
