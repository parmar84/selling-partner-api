<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\DirectFulfillmentInventoryV1\Dto;

use SellingPartnerApi\Dto;

final class ItemDetails extends Dto
{
    /**
     * @param  ItemQuantity  $availableQuantity  Details about item quantity.
     * @param  ?string  $buyerProductIdentifier  The buyer-selected product identification for the item. Either `buyerProductIdentifier` or `vendorProductIdentifier` must be submitted.
     * @param  ?string  $vendorProductIdentifier  The vendor selected product identification for the item. Either `buyerProductIdentifier` or `vendorProductIdentifier` must be submitted.
     * @param  ?bool  $isObsolete  When `true`, the item is permanently unavailable.
     */
    public function __construct(
        public readonly ItemQuantity $availableQuantity,
        public readonly ?string $buyerProductIdentifier = null,
        public readonly ?string $vendorProductIdentifier = null,
        public readonly ?bool $isObsolete = null,
    ) {}
}
