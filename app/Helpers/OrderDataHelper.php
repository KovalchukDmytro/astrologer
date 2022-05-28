<?php


namespace App\Helpers;


use App\Constants\AstrologerConstants;
use App\Constants\ServiceConstants;
use App\Models\Order;

/**
 * Class OrderDataHelper
 * @package App\Helpers
 */
class OrderDataHelper
{
    /**
     * @param Order $orderModel
     * @param object $serviceObj
     * @param object $astrologerObj
     * @return array
     */
    public static function prepareDataForSheets(Order $orderModel, object $serviceObj, object $astrologerObj): array
    {
        return [
            $orderModel->getId(),
            $orderModel->getClientName(),
            $orderModel->getClientEmail(),
            $serviceObj->{ServiceConstants::DB_NAME_FIELD},
            $astrologerObj->{AstrologerConstants::DB_NAME_FIELD},
            $orderModel->getPrice(),
            $orderModel->getUpdatedAt(),
        ];
    }
}
