<?php

namespace Modules\Astrologer\Repositories;

use Modules\Astrologer\Constants\ServiceConstants;
use Modules\Astrologer\Constants\ServiceOfAstrologerConstants;
use Modules\Astrologer\Models\Service;
use Modules\Astrologer\Models\ServiceOfAstrologer;
use Illuminate\Support\Collection;

/**
 * Class ServiceRepository
 */
class ServiceRepository
{
    /**
     * @param int $astrologerId
     * @return Collection
     */
    public static function getServicesByAstrologerId(int $astrologerId): Collection
    {
        $fieldsForView = [
            ServiceConstants::DB_TABLE . '.' . ServiceConstants::DB_NAME_FIELD,
            ServiceOfAstrologerConstants::DB_TABLE . '.' . ServiceOfAstrologerConstants::DB_PRICE_FIELD,
            ServiceOfAstrologerConstants::DB_TABLE . '.' . ServiceOfAstrologerConstants::DB_MASK_FIELD,
        ];

        return ServiceOfAstrologer::query()
            ->select($fieldsForView)
            ->where(ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD, $astrologerId)
            ->leftJoin(
                ServiceConstants::DB_TABLE,
                ServiceOfAstrologerConstants::DB_TABLE . '.' . ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD,
                '=',
                ServiceConstants::DB_TABLE . '.' . ServiceConstants::DB_ID_FIELD
            )
            ->toBase()
            ->get();
    }

    /**
     * @return array
     */
    public static function getNamesServicesMapByAstrologerId(): array
    {
        $fieldsForView = [
            ServiceConstants::DB_TABLE . '.' . ServiceConstants::DB_NAME_FIELD,
            ServiceOfAstrologerConstants::DB_TABLE . '.' . ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD,
        ];

        $allServices = ServiceOfAstrologer::query()
            ->select($fieldsForView)
            ->leftJoin(
                ServiceConstants::DB_TABLE,
                ServiceOfAstrologerConstants::DB_TABLE . '.' . ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD,
                '=',
                ServiceConstants::DB_TABLE . '.' . ServiceConstants::DB_ID_FIELD
            )
            ->get()
            ->toArray();

        return self::mapAstrologerServicesByAstrologerId($allServices);
    }

    /**
     * @param array $allServices
     * @return array
     */
    private static function mapAstrologerServicesByAstrologerId(array $allServices): array
    {
        $result = [];

        foreach ($allServices as $serviceData) {
            $astrologerID = $serviceData[ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD];
            if (!isset($result[$astrologerID])) {
                $result[$astrologerID] = [];
            }

            $result[$astrologerID][] = $serviceData[ServiceConstants::DB_NAME_FIELD];
        }

        return $result;
    }

    /**
     * @param string $mask
     * @return object|null
     */
    public static function getByServiceOfAstrologerByIdMask(string $mask): ?object
    {
        return ServiceOfAstrologer::query()
            ->where(ServiceOfAstrologerConstants::DB_MASK_FIELD, $mask)
            ->toBase()
            ->first();
    }

    /**
     * @param int $serviceId
     * @return Service|null
     */
    public static function getById(int $serviceId): ?object
    {
        return Service::query()->where(ServiceConstants::DB_ID_FIELD, $serviceId)->toBase()->first();
    }
}
