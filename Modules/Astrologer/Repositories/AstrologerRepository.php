<?php

namespace Modules\Astrologer\Repositories;

use Modules\Astrologer\Constants\AstrologerConstants;
use Modules\Astrologer\Models\Astrologer;
use Illuminate\Support\Collection;

/**
 * Class AstrologerRepository
 */
class AstrologerRepository
{
    /**
     * @return Collection
     */
    public static function getAllWithShortInfo(): Collection
    {
        $fieldsForView = [
            AstrologerConstants::DB_TABLE . '.' . AstrologerConstants::DB_ID_FIELD,
            AstrologerConstants::DB_TABLE . '.' . AstrologerConstants::DB_NAME_FIELD,
            AstrologerConstants::DB_TABLE . '.' . AstrologerConstants::DB_AVATAR_FIELD,
        ];

        return Astrologer::query()->select($fieldsForView)->toBase()->get();
    }

    /**
     * @param int $astrologerId
     * @return object|null
     */
    public static function getById(int $astrologerId): ?object
    {
        return Astrologer::query()->where(AstrologerConstants::DB_ID_FIELD, $astrologerId)->toBase()->first();
    }
}
