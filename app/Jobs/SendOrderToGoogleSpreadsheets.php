<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\GoogleSheetsService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class SendOrderToGoogleSpreadsheets
 * @package App\Jobs
 */
class SendOrderToGoogleSpreadsheets implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var Order
     */
    private Order $orderModel;

    /**
     * @param Order $orderModel
     */
    public function __construct(Order $orderModel)
    {
        $this->orderModel = $orderModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        GoogleSheetsService::addOrder($this->orderModel);
    }
}
