<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $dateForCallBack;

    private string $timeTheyWantACallBack;

    public function __construct(string $dateForCallBack, string $timeTheyWantACallBack)
    {
        $this->dateForCallBack = $dateForCallBack;
        $this->timeTheyWantACallBack = $timeTheyWantACallBack;
    }

    public function getDateForCallBack(): string
    {
        return $this->dateForCallBack;
    }

    public function getTimeTheyWantACallBack(): string
    {
        return $this->timeTheyWantACallBack;
    }

    public function isDateAndTimeForCallbackValid(): bool
    {
        $todaysDateOnly = (new Carbon('now'))->toDateString();
        $datePassin = Carbon::parse($this->dateForCallBack);
        $timePassedIn = Carbon::parse($this->getTimeTheyWantACallBack());
        $earlierestOpeningTime = Carbon::parse('09:00:00');
        $leastestClosingTime = Carbon::parse('20:00:00');
        $howManyDaysInTheFuture = $datePassin->diffInDays($todaysDateOnly);

        $weekMap = [
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
        ];

        $dayOfTheWeek = $datePassin->isSunday();
        $weekday = $weekMap[$dayOfTheWeek];

        if ($this->getDateForCallBack() < $todaysDateOnly) {
            return false;
        }

        if (!$timePassedIn->between($leastestClosingTime, $earlierestOpeningTime)) {
            return false;
        }

        if ($weekday === 'Sunday') {
            return false;
        }

        if ($howManyDaysInTheFuture > 6) {
            return false;
        }

        return true;
    }

}
