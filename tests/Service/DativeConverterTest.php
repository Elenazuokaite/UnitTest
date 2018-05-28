<?php
namespace App\Tests\Service;
use App\Service\DativeConverter;
use PHPUnit\Framework\TestCase;

class DativeConverterTest extends TestCase {

    public function getData() {
        return [
            ['Oleg', 'Oleg'],
            ['Paulius', 'Pauliui'],
            ['Jurgis', 'Jurgiui'],
            ['Kastytis', 'Kastyčiui'],
        ];
    }
    /**
     * @param $name
     * @param $expected
     * @dataProvider getData
     */
     public function testConvert($name, $expected)
    {
        $converter = new DativeConverter();
        $value = $converter->convert($name);
        $this->assertEquals($expected, $value);
    }
}