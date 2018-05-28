<?php

namespace App\Tests\Service;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use App\Service\MoneyFormatter;
use App\Service\NumberFormatter;


class MoneyFormatterTest extends TestCase
{
    public function testFormatEur()
    {
        /** @var NumberFormatter|MockObject $numberFormatterMock */
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->with(2835779)
            ->willReturn('2.84M');
        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('2.84M €', $moneyFormatter->formatEur(2835779));
    }
    public function testFormatUsd()
    {
        /** @var NumberFormatter|MockObject $numberFormatterMock */
        $numberFormatterMock = $this->createMock(NumberFormatter::class);
        $numberFormatterMock->expects($this->once())
            ->method('format')
            ->with(211.99)
            ->willReturn('211.99');
        $moneyFormatter = new MoneyFormatter($numberFormatterMock);
        $this->assertEquals('$211.99', $moneyFormatter->formatUsd(211.99));
    }
}