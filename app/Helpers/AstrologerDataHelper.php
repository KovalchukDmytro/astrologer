<?php


namespace App\Helpers;


use App\Constants\AstrologerConstants;
use App\Constants\ServiceOfAstrologerConstants;
use Illuminate\Support\Collection;

/**
 * Class AstrologerDataHelper
 * @package App\Helpers
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
