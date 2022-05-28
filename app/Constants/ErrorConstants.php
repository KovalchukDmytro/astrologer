<?php


namespace App\Constants;


/**
 * Class ErrorConstants
 * @package App\Constants
 */
class ErrorConstants
{
    /**
     * Undefined astrologer text
     */
    public const ERROR_UNDEFINED_ASTROLOGER_MESSAGE = 'Undefined astrologer with id %s';
    /**
     * Undefined astrologer code
     */
    public const ERROR_UNDEFINED_ASTROLOGER_CODE = 1;

    /**
     * Error creating new order text
     */
    public const ERROR_CREATING_NEW_ORDER_MESSAGE = 'Error creating new order';
    /**
     * Error creating new order code
     */
    public const ERROR_CREATING_NEW_ORDER_CODE = 2;

    /**
     * Error while adding data to Google Spreadsheet
     */
    public const ERROR_GOOGLE_SPREADSHEETS = 'Error while adding data to Google Spreadsheet';
}
