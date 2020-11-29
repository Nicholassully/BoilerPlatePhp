<?php

declare(strict_types=1);

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use PHPUnit\Framework\TestCase;

class CallBackTest extends TestCase
{
    public function testCallBackClassCanAcceptDateTheyWantACallBack(): void
    {
        $callback = new CallBack('01/01/2015');

        self::assertEquals('01/01/2015', $callback->getDateForCallBack());
    }

}
