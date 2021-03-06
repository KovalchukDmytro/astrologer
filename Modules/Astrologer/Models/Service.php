<?php

namespace Modules\Astrologer\Models;

use Modules\Astrologer\Constants\ServiceConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Service
 * @package Modules\Astrologer\Models
 * @property int $id
 *
 * @property string $name
 *
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        ServiceConstants::DB_NAME_FIELD,
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
