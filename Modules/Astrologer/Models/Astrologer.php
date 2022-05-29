<?php

namespace Modules\Astrologer\Models;

use Modules\Astrologer\Constants\AstrologerConstants;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Astrologer
 * @package Modules\Astrologer\Models
 * @property int $id
 *
 * @property string $name
 * @property string $avatar
 * @property string $email
 * @property string $biography
 *
 * @property string $created_at
 * @property string $updated_at
 *
 */
class Astrologer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        AstrologerConstants::DB_NAME_FIELD,
        AstrologerConstants::DB_AVATAR_FIELD,
        AstrologerConstants::DB_EMAIL_FIELD,
        AstrologerConstants::DB_BIOGRAPHY_FIELD,
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
    public function getAvatar(): string
    {
        return $this->avatar;
    }

    /**
     * @param string $avatar
     */
    public function setAvatar(string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getBiography(): string
    {
        return $this->biography;
    }

    /**
     * @param string $biography
     */
    public function setBiography(string $biography): void
    {
        $this->biography = $biography;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }
}
