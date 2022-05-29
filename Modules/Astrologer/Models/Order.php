<?php

namespace Modules\Astrologer\Models;

use Modules\Astrologer\Constants\OrderConstants;
use Modules\Astrologer\Events\OrderProcessing;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * @package Modules\Astrologer\Models
 * @property int $id
 *
 * @property string $client_name
 * @property string $client_email
 *
 * @property int $astrologer_id
 * @property int $service_id
 * @property int $price
 * @property int $status
 *
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        OrderConstants::DB_ASTROLOGER_RELATION_FIELD,
        OrderConstants::DB_SERVICE_RELATION_FIELD,
        OrderConstants::DB_CLIENT_NAME_FIELD,
        OrderConstants::DB_CLIENT_EMAIL_FIELD,
        OrderConstants::DB_PRICE_FIELD,
        OrderConstants::DB_STATUS_FIELD,
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
     * @return string
     */
    public function getClientName(): string
    {
        return $this->client_name;
    }

    /**
     * @param string $client_name
     */
    public function setClientName(string $client_name): void
    {
        $this->client_name = $client_name;
    }

    /**
     * @return string
     */
    public function getClientEmail(): string
    {
        return $this->client_email;
    }

    /**
     * @param string $client_email
     */
    public function setClientEmail(string $client_email): void
    {
        $this->client_email = $client_email;
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
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     */
    public function setStatus(int $status): void
    {
        $this->status = $status;
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
     */
    protected function finishSave(array $options)
    {
        event(new OrderProcessing($this, $this->getDirty()));

        parent::finishSave($options);
    }


}
