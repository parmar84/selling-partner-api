<?php

namespace SellingPartnerApi\Seller\NotificationsV1\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;

final class GetDestinationsResponse extends BaseResponse
{
    /**
     * @param  Destination[]  $destinationList A list of destinations.
     * @param  Error[]  $errorList A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly ?array $destinationList = null,
        public readonly ?array $errorList = null,
    ) {
    }
}
