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
    public static function prepareDetailsAstrologerDataForView(object $astrologerData, Collection $servicesData): object
    {
        $astrologerData->services = $servicesData;

        $astrologerData->{AstrologerConstants::DB_AVATAR_FIELD} = asset(
            $astrologerData->{AstrologerConstants::DB_AVATAR_FIELD}
            );

        unset($astrologerData->{AstrologerConstants::DB_CREATED_AT_FIELD});
        unset($astrologerData->{AstrologerConstants::DB_UPDATED_AT_FIELD});

        return $astrologerData;
    }
    /**
     * @param Collection $astrologersData
     * @return Collection
     */
    public static function prepareShortAstrologerDataForView(Collection $astrologersData): Collection
    {
        foreach ($astrologersData as &$astrologer) {
            $astrologer->{AstrologerConstants::DB_AVATAR_FIELD} = asset(
                $astrologer->{AstrologerConstants::DB_AVATAR_FIELD}
            );
        }

        return $astrologersData;
    }
}
