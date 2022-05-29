<?php


namespace Modules\Astrologer\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Modules\Astrologer\Events\OrderProcessing;
use Modules\Astrologer\Listeners\ProcessingPaidOrder;

/**
 * Class EventServiceProvider
 * @package Modules\Astrologer\Providers
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $listen = [
        OrderProcessing::class => [
            ProcessingPaidOrder::class,
        ]
    ];
}
