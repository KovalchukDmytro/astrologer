<?php


namespace Modules\Astrologer\Helpers;


use Modules\Astrologer\Constants\AstrologerConstants;
use Illuminate\Support\Collection;

/**
 * Class AstrologerDataHelper
 * @package Modules\Astrologer\Helpers
 */
class AstrologerDataHelper
{
    /**
     * @param object $astrologerData
     * @param Collection $servicesData
     * @return object
     */
    public static function prepareAstrologerDataForView(object $astrologerData, Collection $servicesData): object
    {
        $astrologerData->services = $servicesData;

        unset($astrologerData->{AstrologerConstants::DB_CREATED_AT_FIELD});
        unset($astrologerData->{AstrologerConstants::DB_UPDATED_AT_FIELD});

        return $astrologerData;
    }
}
