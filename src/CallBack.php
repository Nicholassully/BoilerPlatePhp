<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $dateForCallBack;

    private string $timeTheyWantACallBack;

    private string $dateOfCall;

    private string $timeOfCall;

    public function __construct(
        string $dateForCallBack,
        string $timeTheyWantACallBack,
        string $dateOfCall,
        string $timeOfCall
    ) {
        $this->dateForCallBack = $dateForCallBack;
        $this->timeTheyWantACallBack = $timeTheyWantACallBack;
        $this->dateOfCall = $dateOfCall;
        $this->timeOfCall = $timeOfCall;
    }

    public function getDateForCallBack(): string
    {
        return $this->dateForCallBack;
    }

    public function getTimeTheyWantACallBack(): string
    {
        return $this->timeTheyWantACallBack;
    }

    public function getDateOfCall(): string
    {
        return $this->dateOfCall;
    }

    public function getTimeOfCall(): string
    {
        return $this->timeOfCall;
    }


    public function isDateAndTimeForCallbackValid(): bool
    {
        $todaysDateOnly = Carbon::parse($this->getDateOfCall());
        $todaysTimeOnlyWithTwoHoursAdded = Carbon::parse($this->getTimeOfCall())->addHours(2);
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
                if (($datePassin->isMonday() || $datePassin->isTuesday() || $datePassin->isWednesday())) {
                    if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('18:00:00'))) {
                        return true;
                    }
                    return false;
                }
                if ($datePassin->isThursday() || $datePassin->isFriday()) {
                    if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('20:00:00'))) {
                        return true;
                    }
                    return false;
                }
                if ($datePassin->isSaturday()) {
                    if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('12:30:00'))) {
                        return true;
                    }
                    return false;
                }
                return false;
            }
        } else {
            if (($datePassin->isMonday() || $datePassin->isTuesday() || $datePassin->isWednesday())) {
                if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('18:00:00'))) {
                    return true;
                }
                return false;
            }
            if ($datePassin->isThursday() || $datePassin->isFriday()) {
                if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('20:00:00'))) {
                    return true;
                }
                return false;
            }
            if ($datePassin->isSaturday()) {
                if ($timePassedIn->between(Carbon::parse('09:00:00'), Carbon::parse('12:30:00'))) {
                    return true;
                }
                return false;
            }
        }

        return true;
    }
}
