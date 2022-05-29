<?php


namespace Modules\Astrologer\Helpers;


use Modules\Astrologer\Constants\AstrologerConstants;
use Modules\Astrologer\Constants\ServiceConstants;
use Modules\Astrologer\Models\Order;

/**
 * Class OrderDataHelper
 * @package Modules\Astrologer\Helpers
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
