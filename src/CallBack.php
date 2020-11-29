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
        $todaysTimeOnlyWithTwoHoursAdded = Carbon::parse('now')->addHours(2);
        $datePassin = Carbon::parse($this->dateForCallBack);
        $timePassedIn = Carbon::parse($this->getTimeTheyWantACallBack());
        $earlierestOpeningTime = Carbon::parse('09:00:00');
        $leastestClosingTime = Carbon::parse('20:00:00');
        $howManyDaysInTheFuture = $datePassin->diffInDays($todaysDateOnly);

        if ($this->getDateForCallBack() < $todaysDateOnly) {
            return false;
        }

        if (!$timePassedIn->between($leastestClosingTime, $earlierestOpeningTime)) {
            return false;
        }

        if ($datePassin->isSunday()) {
            return false;
        }

        if ($howManyDaysInTheFuture > 6) {
            return false;
        }

        if ($todaysDateOnly === $datePassin->toDateString()) {
            if ($timePassedIn->lessThan($todaysTimeOnlyWithTwoHoursAdded)) {
                return false;
            }
        } else {
            if ($datePassin->isMonday() || $datePassin->isTuesday() || $datePassin->isWednesday()) {
               if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('18:00:00'))) {
                   return true;
               }
            }
            if ($datePassin->isThursday() || $datePassin->isFriday()) {
                if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('20:00:00'))) {
                    return true;
                }
            }
        }

        return true;
    }

}
