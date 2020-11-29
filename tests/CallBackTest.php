<?php

declare(strict_types=1);

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use PHPUnit\Framework\TestCase;

class CallBackTest extends TestCase
{
    public function testCallBackClassCanAcceptInputParameters(): void
    {
        $callback = new CallBack('01/01/2015','19:20:20');

        self::assertEquals('01/01/2015', $callback->getDateForCallBack());
        self::assertEquals('19:20:20', $callback->getTimeTheyWantACallBack());
    }


}
