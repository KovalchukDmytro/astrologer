<?php

namespace Modules\Astrologer\Listeners;

use Modules\Astrologer\Constants\OrderConstants;
use Modules\Astrologer\Constants\OrderStatusConstants;
use Modules\Astrologer\Events\OrderProcessing;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Astrologer\Services\GoogleSheetsService;

class ProcessingPaidOrder implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param  OrderProcessing  $event
     * @return void
     */
    public function handle(OrderProcessing $event)
    {
        if (
            isset($event->modelDirtyFields[OrderConstants::DB_STATUS_FIELD])
            && $event->orderModel->getStatus() === OrderStatusConstants::PAID
        ) {
            GoogleSheetsService::addOrder($event->orderModel);
        }
    }
}
