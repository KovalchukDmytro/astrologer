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
     * ID mask for service
     */
    private const SERVICE_ID_MASK = '%s_%s';

    /**
     * @param object $astrologerData
     * @param Collection $servicesData
     * @return object
     */
    public static function prepareAstrologerDataForView(object $astrologerData, Collection $servicesData): object
    {
        foreach ($servicesData as &$servicesDatum) {
            $servicesDatum->id = sprintf(
                self::SERVICE_ID_MASK,
                $servicesDatum->{ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD},
                $servicesDatum->{ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD},
            );

            unset($servicesDatum->{ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD});
            unset($servicesDatum->{ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD});
        }

        $astrologerData->services = $servicesData;

        unset($astrologerData->{AstrologerConstants::DB_CREATED_AT_FIELD});
        unset($astrologerData->{AstrologerConstants::DB_UPDATED_AT_FIELD});

        return $astrologerData;
    }
}
