<?php

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use PHPUnit\Framework\TestCase;

class CallBackTest extends TestCase
{
    public function testCallBackClassCanAcceptInputParameters()
    {
        $callback = new CallBack('01/01/2015', '19:20:20');

        self::assertEquals('01/01/2015', $callback->getDateForCallBack());
        self::assertEquals('19:20:20', $callback->getTimeTheyWantACallBack());
    }

    public function testReturnsFalseWhenDatePassedInIsBeforeTodaysDate()
    {
        $callback = new CallBack('2020-11-28', '19:20:20');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseWhenTimePassedInIsNotBetweenOpeningTimes()
    {
        $callback = new CallBack('2020-11-29', '22:20:20');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseDatePassInIsASunday()
    {
        $callback = new CallBack('2020-11-29', '19:20:20');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseDatePassInIsMoreThenSixDaysInTheFuture()
    {
        $callback = new CallBack('2020-12-06', '19:20:20');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsTheSameAsToday()
    {
        $callback = new CallBack('2020-11-29', '12:20:20');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsAMondayAndTimeIsValid()
    {
        $callback = new CallBack('2020-11-30', '16:20:20');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsAThursdayAndTimeIsValid()
    {
        $callback = new CallBack('2020-12-3', '19:20:20');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsASundayAndTimeIsValid()
    {
        $callback = new CallBack('2020-12-02', '12:30:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }
}
