<?php

namespace Modules\Astrologer\Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;

/**
 * Class OrderControllerTest
 * @package Modules\Astrologer\Tests\Feature\Http\Controllers
 */
class OrderControllerTest extends TestCase
{
    /**
     * Headers for POST-requests
     */
    private const POST_HEADERS = [
        'Accept' => 'application/json',
    ];

    /**
     * setUp method
     */
    protected function setUp(): void
    {
        parent::setUp();

        URL::forceRootUrl('http://testing.url');
    }

    /**
     * Test OrderController::make method
     */
    public function testMake(): void
    {
        $expectedData = [
            'success' => true
        ];

        $postData = [
            'client_name' => 'client name',
            'client_email' => 'email@asd.com',
            'service_mask' => '2_1',
        ];

        $response = $this->post('/api/v1/order/make', $postData, self::POST_HEADERS);

        $response->assertStatus(200);
        $response->assertJson($expectedData);
    }

    /**
     * Test OrderController::make method with incorrect service
     */
    public function testMakeWithIncorrectService(): void
    {
        $expectedData = [
            'message' => 'The selected service mask is invalid.',
            'errors' => [
                'service_mask' => [
                    'The selected service mask is invalid.',
                ],
            ],
        ];

        $postData = [
            'client_name' => 'client name',
            'client_email' => 'email@asd.com',
            'service_mask' => '2_11',
        ];

        $response = $this->post('/api/v1/order/make', $postData, self::POST_HEADERS);

        $response->assertStatus(422);
        $response->assertJson($expectedData);
    }

    /**
     * Test OrderController::make method without service
     */
    public function testMakeWithoutService(): void
    {
        $expectedData = [
            'message' => 'The service mask field is required.',
            'errors' => [
                'service_mask' => [
                    'The service mask field is required.',
                ],
            ],
        ];

        $postData = [
            'client_name' => 'client name',
            'client_email' => 'email@asd.com',
        ];

        $response = $this->post('/api/v1/order/make', $postData, self::POST_HEADERS);

        $response->assertStatus(422);
        $response->assertJson($expectedData);
    }

    /**
     * Test OrderController::make method with empty data
     */
    public function testMakeWithEmptyData(): void
    {
        $expectedData = [
            'message' => 'The client name field is required. (and 2 more errors)',
            'errors' => [
                'client_name' => [
                    'The client name field is required.',
                ],
                'client_email' => [
                    'The client email field is required.',
                ],
                'service_mask' => [
                    'The service mask field is required.',
                ],
            ],
        ];

        $postData = [];

        $response = $this->post('/api/v1/order/make', $postData, self::POST_HEADERS);

        $response->assertStatus(422);
        $response->assertJson($expectedData);
    }
}
