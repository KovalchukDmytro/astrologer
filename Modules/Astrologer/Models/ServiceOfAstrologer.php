<?php

namespace Modules\Astrologer\Models;

use Modules\Astrologer\Constants\ServiceOfAstrologerConstants;
use Modules\Astrologer\Helpers\ServiceDataHelper;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceOfAstrologer
 * @package Modules\Astrologer\Models
 * @property int $id
 *
 * @property int $astrologer_id
 * @property int $service_id
 * @property int $price
 *
 * @property string $mask
 *
 * @property string $created_at
 * @property string $updated_at
 *
 */
class ServiceOfAstrologer extends Model
{

    /**
     * @var string
     */
    protected $table = ServiceOfAstrologerConstants::DB_TABLE;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD,
        ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD,
        ServiceOfAstrologerConstants::DB_PRICE_FIELD,
        ServiceOfAstrologerConstants::DB_MASK_FIELD,
    ];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getAstrologerId(): int
    {
        return $this->astrologer_id;
    }

    /**
     * @param int $astrologer_id
     */
    public function setAstrologerId(int $astrologer_id): void
    {
        $this->astrologer_id = $astrologer_id;
    }

    /**
     * @return int
     */
    public function getServiceId(): int
    {
        return $this->service_id;
    }

    /**
     * @param int $service_id
     */
    public function setServiceId(int $service_id): void
    {
        $this->service_id = $service_id;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getMask(): string
    {
        return $this->mask;
    }

    /**
     * @param string $mask
     */
    public function setMask(string $mask): void
    {
        $this->mask = $mask;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param array $options
     * @return bool
     */
    public function save(array $options = []): bool
    {
        if (
            $this->isDirty(ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD)
            || $this->isDirty(ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD)
        ) {
            $this->setMask(ServiceDataHelper::encodeServiceIdMask($this->getAstrologerId(), $this->getServiceId()));
        }

        return parent::save($options);
    }

}
