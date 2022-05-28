<?php

namespace App\Repositories;

use App\Constants\OrderConstants;
use App\Constants\OrderStatusConstants;
use App\Constants\ServiceOfAstrologerConstants;
use App\Models\Order;

/**
 * Class OrderRepository
 */
class OrderRepository
{
    /**
     * @param array $orderData
     * @param object $serviceRelation
     * @return bool
     */
    public static function create(array $orderData, object $serviceRelation): bool
    {
        return (bool)Order::query()->create([
            OrderConstants::DB_SERVICE_RELATION_FIELD =>
                $serviceRelation->{ServiceOfAstrologerConstants::DB_SERVICE_RELATION_FIELD},
            OrderConstants::DB_ASTROLOGER_RELATION_FIELD =>
                $serviceRelation->{ServiceOfAstrologerConstants::DB_ASTROLOGER_RELATION_FIELD},
            OrderConstants::DB_PRICE_FIELD => $serviceRelation->{ServiceOfAstrologerConstants::DB_PRICE_FIELD},
            OrderConstants::DB_CLIENT_NAME_FIELD => $orderData['client_name'],
            OrderConstants::DB_CLIENT_EMAIL_FIELD => $orderData['client_email'],
            OrderConstants::DB_STATUS_FIELD => $orderData['status'] ?? OrderStatusConstants::AWAITING_PAYMENT,
        ]);
    }
}
