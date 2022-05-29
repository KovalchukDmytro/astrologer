<?php


namespace Modules\Astrologer\Constants;


/**
 * Class OrderConstants
 * @package Modules\Astrologer\Constants
 */
class OrderConstants
{
    /**
     * Table name for Order Model
     */
    public const DB_TABLE = 'order';

    /**
     *
     */
    public const DB_ID_FIELD = 'id';
    /**
     *
     */
    public const DB_CLIENT_NAME_FIELD = 'client_name';
    /**
     *
     */
    public const DB_CLIENT_EMAIL_FIELD = 'client_email';
    /**
     *
     */
    public const DB_ASTROLOGER_RELATION_FIELD = 'astrologer_id';
    /**
     *
     */
    public const DB_SERVICE_RELATION_FIELD = 'service_id';
    /**
     *
     */
    public const DB_PRICE_FIELD = 'price';
    /**
     *
     */
    public const DB_STATUS_FIELD = 'status';
}
