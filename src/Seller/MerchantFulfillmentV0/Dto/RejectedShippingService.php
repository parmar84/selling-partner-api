<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Seller\MerchantFulfillmentV0\Dto;

use SellingPartnerApi\Dto;

final class RejectedShippingService extends Dto
{
    protected static array $attributeMap = [
        'carrierName' => 'CarrierName',
        'shippingServiceName' => 'ShippingServiceName',
        'shippingServiceId' => 'ShippingServiceId',
        'rejectionReasonCode' => 'RejectionReasonCode',
        'rejectionReasonMessage' => 'RejectionReasonMessage',
    ];

    /**
     * @param  string  $carrierName  The rejected shipping carrier name. For example, USPS.
     * @param  string  $shippingServiceName  The rejected shipping service localized name. For example, FedEx Standard Overnight.
     * @param  string  $shippingServiceId  An Amazon-defined shipping service identifier.
     * @param  string  $rejectionReasonCode  A reason code meant to be consumed programatically. For example, `CARRIER_CANNOT_SHIP_TO_POBOX`.
     * @param  ?string  $rejectionReasonMessage  A localized human readable description of the rejected reason.
     */
    public function __construct(
        public readonly string $carrierName,
        public readonly string $shippingServiceName,
        public readonly string $shippingServiceId,
        public readonly string $rejectionReasonCode,
        public readonly ?string $rejectionReasonMessage = null,
    ) {}
}
