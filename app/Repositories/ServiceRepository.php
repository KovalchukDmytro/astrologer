<?php

namespace App\Repositories;

use App\Models\Service;
use App\Models\ServiceOfAstrologer;
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
        $servicesTable = app(Service::class)->getTable();
        $serviceOfAstrologerTable = app(ServiceOfAstrologer::class)->getTable();

        $fieldsForView = [
            $servicesTable . '.name',
            $serviceOfAstrologerTable . '.price',
            $serviceOfAstrologerTable . '.service_id',
            $serviceOfAstrologerTable . '.astrologer_id',
        ];

        return ServiceOfAstrologer::query()
            ->select($fieldsForView)
            ->where('astrologer_id', $astrologerId)
            ->leftJoin(
                $servicesTable,
                $serviceOfAstrologerTable . '.service_id',
                '=',
                $servicesTable . '.id'
            )
            ->toBase()
            ->get();
    }
}
