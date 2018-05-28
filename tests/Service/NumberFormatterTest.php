<?php
namespace App\Tests;
use PHPUnit\Framework\TestCase;
use App\Service\NumberFormatter;
class NumberFormatterTest extends TestCase
{

    /**
     * @return array
     */
    public function getData(): array
    {
        return [
            [999500, '1.00M' ],
            [1000000.9, '1.00M'],
            [999490, '999K'],
            [99950, '100K'],
            [99949, '99 949'],
            [98999.9, '99 000'],
            [999.995, '1 000'],
            [999.994, '999.99'],
            [999.9, '999.90'],
            [50.9954, '51.00'],
            [10.00, '10'],
            [0, '0'],
            [-1, '-1.00'],
            [-99950, '-100K'],
            [-999500, '-1.00M' ],
        ];
    }
    /**
     * @param $number
     * @param $expected
     * @dataProvider getData
     */
    public function testFormat($number, $expected)
    {
        $formatter = new NumberFormatter();
        $value = $formatter->format($number);
        $this->assertEquals($expected, $value);
    }
}
