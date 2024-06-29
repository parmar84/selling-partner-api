<?php

/**
 * This file is auto-generated by Saloon SDK Generator
 * Generator: Crescat\SaloonSdkGenerator\Generators\DtoGenerator
 * Do not modify it directly.
 */

declare(strict_types=1);

namespace SellingPartnerApi\Vendor\DirectFulfillmentInventoryV1\Dto;

use SellingPartnerApi\Dto;

final class InventoryUpdate extends Dto
{
    protected static array $complexArrayTypes = ['items' => [ItemDetails::class]];

    /**
     * @param  PartyIdentification  $sellingParty  Name, address and tax details for a group.
     * @param  bool  $isFullUpdate  When `true`, this request contains a full feed. When `false`, this request contains a partial feed. When sending a full feed, you must send information about all items in the warehouse. Any items not in the full feed are updated as not available. When sending a partial feed, only include the items that need an inventory update. The status of other items will remain unchanged.
     * @param  ItemDetails[]  $items  A list of inventory items with updated details, including quantity available.
     */
    public function __construct(
        public readonly PartyIdentification $sellingParty,
        public readonly bool $isFullUpdate,
        public readonly array $items,
    ) {}
}
