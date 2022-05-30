<?php

namespace Modules\Astrologer\Tests\Feature\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;

/**
 * Class AstrologerControllerTest
 * @package Modules\Astrologer\Tests\Feature\Http\Controllers
 */
class AstrologerControllerTest extends TestCase
{
    /**
     * setUp method
     */
    protected function setUp(): void
    {
        parent::setUp();

        URL::forceRootUrl('http://testing.url');
    }

    /**
     * Test AstrologerController::all method
     */
    public function testAll()
    {
        $expectedData = [
            [
                'id' => 1,
                'name' => 'Люсі',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                    'Натальна карта',
                    'Звіт сумісності'
                ]
            ],
            [
                'id' => 2,
                'name' => 'Бен',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                    'Натальна карта',
                    'Детальний гороскоп'
                ]
            ],
            [
                'id' => 3,
                'name' => 'Барбара',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                    'Натальна карта',
                    'Гороскоп на рік'
                ]
            ],
            [
                'id' => 4,
                'name' => 'Кевін',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                    'Гороскоп на рік',
                    'Детальний гороскоп'
                ]
            ],
            [
                'id' => 5,
                'name' => 'Сюзі',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                ]
            ],
            [
                'id' => 6,
                'name' => 'Емма',
                'avatar' => 'http://testing.url/images/avatar.png',
                'services' => [
                ]
            ]
        ];
        $response = $this->get('/api/v1/astrologer/all');

        $response->assertStatus(200);
        $response->assertJson($expectedData);
    }

    /**
     * Test AstrologerController::details method
     */
    public function testDetails()
    {
        $expectedData = [
            'id' => 1,
            'name' => 'Люсі',
            'avatar' => 'http://testing.url/images/avatar.png',
            'email' => 'lusi@astrologer.dev',
            'biography' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent sagittis sit amet odio eu mattis. Nam vitae mauris et felis pulvinar rhoncus. Aenean bibendum euismod odio, nec vestibulum neque tristique.',
            'services' => [
                [
                    'name' => 'Натальна карта',
                    'price' => 5,
                    'mask' => '1_1'
                ],
                [
                    'name' => 'Натальна карта',
                    'price' => 6,
                    'mask' => '2_1'
                ],
                [
                    'name' => 'Натальна карта',
                    'price' => 6,
                    'mask' => '3_1'
                ]
            ]
        ];

        $response = $this->get('/api/v1/astrologer/details/1');

        $response->assertStatus(200);
        $response->assertJson($expectedData);
    }

    /**
     * Test AstrologerController::details method for undefined astrologer
     */
    public function testDetailsForUndefinedAstrologer()
    {
        $expectedData = [
            'message' => 'Undefined astrologer with id 10',
            'errors' => [
                1 => 'Undefined astrologer with id 10',
            ]
        ];

        $response = $this->get('/api/v1/astrologer/details/10');

        $response->assertStatus(200);
        $response->assertJson($expectedData);
    }
}
