<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\DirectFulfillmentShippingV1\Dto;

use SellingPartnerApi\Dto;

final class ShippingLabelList extends Dto
{
    protected static array $complexArrayTypes = ['shippingLabels' => [ShippingLabel::class]];

    /**
     * @param  ?Pagination  $pagination  The pagination elements required to retrieve the remaining data.
     * @param  ShippingLabel[]|null  $shippingLabels  An array containing the details of the generated shipping labels.
     */
    public function __construct(
        public readonly ?Pagination $pagination = null,
        public readonly ?array $shippingLabels = null,
    ) {}
}
