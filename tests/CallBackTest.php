<?php

namespace BoilerPlatePhp\Tests;

use BoilerPlatePhp\CallBack;
use PHPUnit\Framework\TestCase;

class CallBackTest extends TestCase
{
    public function testCallBackClassCanAcceptInputParameters()
    {
        $callback = new CallBack('01/01/2015', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals('01/01/2015', $callback->getDateCallBackRequested());
        self::assertEquals('19:20:20', $callback->getTimeCallBackRequested());
        self::assertEquals('2020-11-29', $callback->getDateUserMadeContact());
        self::assertEquals('14:00:00', $callback->getTimeUserMadeContact());
    }

    public function testReturnsFalseWhenDatePassedInIsBeforeUserMadeContact()
    {
        $callback = new CallBack('2020-11-28', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsFalseWhenTimeCallBackRequestedIsNotBetweenEarliestAndLatestOpeningTimes()
    {
        $callback = new CallBack('2020-11-29', '22:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsFalseWhenDateCallBackRequestedIsASunday()
    {
        $callback = new CallBack('2020-11-29', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsFalseWhenDateCallBackRequestedIsMoreThenSixDaysFromDateUserMadeContact()
    {
        $callback = new CallBack('2020-12-08', '19:20:20', '2020-11-30', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsFalseWhenDateCallBackRequestedIsTheSameAsDateUserMadeContactAndNotMoreThanTwoHoursInTheFuture()
    {
        $callback = new CallBack('2020-11-30', '12:20:20', '2020-11-30', '14:00:00');

        self::assertEquals(false, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsTrueWhenDateCallBackRequestedIsAMondayAndTimeCallBackRequestedIsBetweenMondayOpeningTimes()
    {
        $callback = new CallBack('2020-11-30', '16:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsTrueWhenDateCallBackRequestedIsAThursdayAndTimeCallBackRequestedIsBetweenThursdayOpeningTimes()
    {
        $callback = new CallBack('2020-12-03', '19:20:20', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallBackRequestValid());
    }

    public function testReturnsTrueWhenDateCallBackRequestedIsASaturdayAndTimeCallBackRequestedIsBetweenSaturdayOpeningTimes()
    {
        $callback = new CallBack('2020-12-05', '12:30:00', '2020-11-29', '14:00:00');

        self::assertEquals(true, $callback->isDateAndTimeForCallBackRequestValid());
    }
}
