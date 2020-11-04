<?php

declare(strict_types=1);

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use BoilerPlatePhp\TimePeriods;
use PHPUnit\Framework\TestCase;

final class CallBackTest extends TestCase
{
    public function testCallBackClass(): void
    {
        $callback = new CallBack('Bob', '01/01/2015', 6 ,  TimePeriods::Day);

        self::assertEquals('Bob', $callback->getName());
    }

    public function testCallBackCanAddTwoDateTogether(): void
    {
        $callBack = new CallBack('Bob', '01/01/2015', 6 , 'days');

        self::assertEquals('07/01/2015' ,$callBack->getFutureDate());
    }

    public function testCallBackWillErrorWhenDateIsInvalidDateCalled(): void
    {
        $callBack = new CallBack('Bob', '01-01-2015', 6 , 'days');

        self::assertEquals('Call date is invalid' , $callBack->getFutureDate());
    }
}
