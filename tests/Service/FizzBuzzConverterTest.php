<?php
namespace App\Tests\Service;
use App\Service\FizzBuzzConverter;
use PHPUnit\Framework\TestCase;

class FizzBuzzConverterTest extends TestCase {

    public function getData() {
        return [
            [1, 1],
            [3, 'Fizz'],
            [5, 'Buzz'],
            [15, 'FizzBuzz'],
            [0, 0]
        ];
    }
    /**
     * @param $number
     * @param $expected
     * @dataProvider getData
     */
     public function testConvert($number, $expected)
    {
        $converter = new FizzBuzzConverter();
        $value = $converter->convert($number);
        $this->assertEquals($expected, $value);
    }
}