<?php

namespace App\Listeners;

use App\Constants\OrderConstants;
use App\Constants\OrderStatusConstants;
use App\Events\OrderProcessing;
use App\Jobs\SendOrderToGoogleSpreadsheets;

/**
 * Class ChangeOrderPaymentStatus
 * @package App\Listeners
 */
class ChangeOrderData
{
    /**
     * Handle the event.
     *
     * @param OrderProcessing $event
     * @return void
     */
    public function handle(OrderProcessing $event)
    {
        if (
            $event->orderModel->isDirty(OrderConstants::DB_STATUS_FIELD)
            && $event->orderModel->getStatus() === OrderStatusConstants::PAID
        ) {
            SendOrderToGoogleSpreadsheets::dispatch($event->orderModel);
        }
    }
}
