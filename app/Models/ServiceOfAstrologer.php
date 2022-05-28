<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ServiceOfAstrologer
 * @package App\Models
 * @property int $id
 *
 * @property int $astrologer_id
 * @property int $service_id
 * @property int $price
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
    protected $table = 'services_of_astrologers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'astrologer_id',
        'service_id',
        'price',
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
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
