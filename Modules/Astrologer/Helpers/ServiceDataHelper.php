<?php


namespace Modules\Astrologer\Helpers;

/**
 * Class ServiceDataHelper
 * @package Modules\Astrologer\Helpers
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
