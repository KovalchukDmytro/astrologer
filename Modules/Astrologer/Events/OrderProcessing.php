<?php

namespace Modules\Astrologer\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Modules\Astrologer\Models\Order;

/**
 * Class OrderProcessing
 * @package Modules\Astrologer\Events
 */
class OrderProcessing
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var Order
     */
    public Order $orderModel;
    /**
     * @var array
     */
    public array $modelDirtyFields;

    /**
     * @param Order $orderModel
     * @param array $dirtyFields
     */
    public function __construct(Order $orderModel, array $dirtyFields = [])
    {
        $this->orderModel = $orderModel;
        $this->modelDirtyFields = $dirtyFields;
    }
}
