<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class CallBackTest extends TestCase
{
    public function testCallBackClass(): void
    {
        $callback = new CallBack('Bob', '01/01/2015', 6 ,  TimePeriod::Day);

        self::assertEquals('bob', $callback->getName());
    }
//
//    public function testCallBackHasANameDateAndCallBackDate(): string
//    {
//        $callBack = new CallBack('Bob', '01/01/2015', 6 , 'days');
//
//    }
}
