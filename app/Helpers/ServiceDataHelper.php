<?php


namespace App\Helpers;

/**
 * Class ServiceDataHelper
 * @package App\Helpers
 */
class ServiceDataHelper
{
    /**
     * ID mask for service
     */
    private const SERVICE_ID_MASK = '%s_%s';

    /**
     * @param int $astrologerId
     * @param int $serviceId
     * @return string
     */
    public static function encodeServiceIdMask(int $astrologerId, int $serviceId): string
    {
        return sprintf(self::SERVICE_ID_MASK, $astrologerId, $serviceId);
    }
}
