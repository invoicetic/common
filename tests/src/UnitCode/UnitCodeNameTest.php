<?php

namespace Invoicetic\Common\Tests\UnitCode;

use Invoicetic\Common\Dto\Base\UnitCode;
use Invoicetic\Common\UnitCode\UnitCodeName;
use PHPUnit\Framework\TestCase;

class UnitCodeNameTest extends TestCase
{
    /**
     * @param $key
     * @param $lang
     * @param $expected
     * @return void
     * @dataProvider data_for
     */
    public function test_for($key, $lang, $expected)
    {
        self::assertSame($expected, UnitCodeName::for($key, $lang));
    }

    public function data_for()
    {
        return [
            [UnitCode::UNIT, 'en', 'unit'],
            [UnitCode::UNIT, null, 'unit'],
            [UnitCode::UNIT, 'ro', 'unit'],
            [UnitCode::PIECE, 'en', 'piece'],
            [UnitCode::PIECE, 'ro', 'buc'],
            ['test', 'en', 'test'],
            ['test', 'ro', 'test'],
            ['test', null, 'test'],
        ];
    }
}
