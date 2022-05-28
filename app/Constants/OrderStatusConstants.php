<?php


namespace App\Constants;


/**
 * Class OrderStatusConstants
 * @package App\Constants
 */
class OrderStatusConstants
{
    /**
     * Order status is undefined
     */
    public const UNDEFINED = 0;

    /**
     * Order is awaiting payment
     */
    public const AWAITING_PAYMENT = 1;

    /**
     * Order has been paid
     */
    public const PAID = 2;
}
