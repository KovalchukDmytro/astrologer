<?php

namespace Modules\Astrologer\Tests\Unit\Helpers;

use Modules\Astrologer\Helpers\OrderDataHelper;
use Modules\Astrologer\Models\Order;
use Tests\TestCase;

/**
 * Class ServiceDataHelperTest
 * @package Modules\Astrologer\Tests\Unit\Helpers
 */
class ServiceDataHelperTest extends TestCase
{
    /**
     * Test OrderDataHelper::prepareDataForSheets method
     */
    public function testPrepareDataForSheets(): void
    {
        $orderModel = new Order([
            'client_name' => 'client_name',
            'client_email' => 'client_email@mail.dev',
            'price' => 40,
        ]);
        $orderModel->setId(10);
        $orderModel->setUpdatedAt('2020-01-01 12:00:00');
        $inputData = [
            'order_model' => $orderModel,
            'service_obj' => (object)[
                'name' => 'service name'
            ],
            'astrologer_obj' => (object)[
                'name' => 'astrologer name'
            ],
        ];

        $expectedData = [
            10, 'client_name', 'client_email@mail.dev', 'service name', 'astrologer name', 40, '2020-01-01 12:00:00'
        ];

        $functionResult = OrderDataHelper::prepareDataForSheets(
            $inputData['order_model'],
            $inputData['service_obj'],
            $inputData['astrologer_obj']
        );

        $this->assertEquals($expectedData, $functionResult);
    }
}
