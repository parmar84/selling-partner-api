<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: SellingPartnerApi\Generator\Generators\ResponseGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\OrdersV0\Responses;

use SellingPartnerApi\Response;
use SellingPartnerApi\Seller\OrdersV0\Dto\Error;
use SellingPartnerApi\Seller\OrdersV0\Dto\OrderItemsBuyerInfoList;

final class GetOrderItemsBuyerInfoResponse extends Response
{
    protected static array $complexArrayTypes = ['errors' => Error::class];

    /**
     * @param  ?OrderItemsBuyerInfoList  $payload  A single order item's buyer information list with the order ID.
     * @param  Error[]|null  $errors  A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?OrderItemsBuyerInfoList $payload = null,
        public readonly ?array $errors = null,
    ) {}
}
