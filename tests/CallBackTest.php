<?php

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use PHPUnit\Framework\TestCase;

class CallBackTest extends TestCase
{
    public function testCallBackClassCanAcceptInputParameters()
    {
        $callback = new CallBack('01/01/2015', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals('01/01/2015', $callback->getDateForCallBack());
        self::assertEquals('19:20:20', $callback->getTimeTheyWantACallBack());
        self::assertEquals('2020-11-29', $callback->getDateOfCall());
        self::assertEquals('14:00:00', $callback->getTimeOfCall());
    }

    public function testReturnsFalseWhenDatePassedInIsBeforeTodaysDate()
    {
        $callback = new CallBack('2020-11-28', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseWhenTimePassedInIsNotBetweenOpeningTimes()
    {
        $callback = new CallBack('2020-11-29', '22:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseDatePassInIsASunday()
    {
        $callback = new CallBack('2020-11-29', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseDatePassInIsMoreThenSixDaysInTheFuture()
    {
        $callback = new CallBack('2020-12-08', '19:20:20', '2020-11-30', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsFalseDatePassInIsTheSameAsTodayAndNotTwoHoursInTheFuture()
    {
        $callback = new CallBack('2020-11-30', '12:20:20', '2020-11-30', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsAMondayAndTimeIsValid()
    {
        $callback = new CallBack('2020-11-30', '16:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsAThursdayAndTimeIsValid()
    {
        $callback = new CallBack('2020-12-03', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }

    public function testReturnsTrueDatePassInIsASaturdayAndTimeIsValid()
    {
        $callback = new CallBack('2020-12-05', '12:30:00', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallbackValid());
    }
}
