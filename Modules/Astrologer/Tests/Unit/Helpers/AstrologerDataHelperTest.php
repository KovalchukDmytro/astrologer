<?php

namespace Modules\Astrologer\Tests\Unit\Helpers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\URL;
use Modules\Astrologer\Helpers\AstrologerDataHelper;
use Tests\TestCase;

/**
 * Class AstrologerDataHelperTest
 * @package Modules\Astrologer\Tests\Unit\Helpers
 */
class AstrologerDataHelperTest extends TestCase
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
     * Test AstrologerDataHelper::prepareDetailsAstrologerDataForView method
     */
    public function testPrepareDetailsAstrologerDataForView(): void
    {
        $inputData = [
            'astrologer_data' => (object)[
                'avatar' => 'images/avatar.png',
                'created_at' => '2020-01-01',
                'updated_at' => '2020-01-01',
            ],
            'services_data' => Collection::make([
                (object)[
                    'name' => 'service 1'
                ]
            ])
        ];

        $expectedData = (object)[
            'avatar' => 'http://testing.url/images/avatar.png',
            'services' => Collection::make([
                (object)[
                    'name' => 'service 1'
                ]
            ]),
        ];

        $functionResult = AstrologerDataHelper::prepareDetailsAstrologerDataForView(
            $inputData['astrologer_data'],
            $inputData['services_data']
        );

        $this->assertEquals($expectedData, $functionResult);
    }

    /**
     * Test AstrologerDataHelper::prepareShortAstrologerDataForView method
     */
    public function testPrepareShortAstrologerDataForView(): void
    {
        $inputData = Collection::make([
            (object)[
                'avatar' => 'images/avatar1.png',
            ],
            (object)[
                'avatar' => 'images/avatar2.png',
            ],
        ]);

        $expectedData = Collection::make([
            (object)[
                'avatar' => 'http://testing.url/images/avatar1.png',
            ],
            (object)[
                'avatar' => 'http://testing.url/images/avatar2.png',
            ],
        ]);

        $functionResult = AstrologerDataHelper::prepareShortAstrologerDataForView(
            $inputData
        );

        $this->assertEquals($expectedData, $functionResult);
    }
}
