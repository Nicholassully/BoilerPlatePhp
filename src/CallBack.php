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

    private string $todaysDateOnly;

    private Carbon $todaysTimeOnlyWithTwoHoursAdded;

    private Carbon $datePassin;

    private Carbon $timePassedIn;

    private Carbon $earlierestOpeningTime;

    private Carbon $leastestClosingTime;

    private int $howManyDaysInTheFuture;


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
        $this->todaysDateOnly = Carbon::parse($this->getDateOfCall())->toDateString();
        $this->todaysTimeOnlyWithTwoHoursAdded = Carbon::parse($this->getTimeOfCall())->addHours(2);
        $this->datePassin = Carbon::parse($this->dateForCallBack);
        $this->timePassedIn = Carbon::parse($this->getTimeTheyWantACallBack());
        $this->earlierestOpeningTime = Carbon::parse('09:00:00');
        $this->leastestClosingTime = Carbon::parse('20:00:00');
        $this->howManyDaysInTheFuture = $this->datePassin->diffInDays($this->todaysDateOnly);

        if ($this->getDateForCallBack() < $this->todaysDateOnly) {
            return false;
        }

        if (!$this->timePassedIn->between($this->leastestClosingTime, $this->earlierestOpeningTime)) {
            return false;
        }

        if ($this->datePassin->isSunday()) {
            return false;
        }

        if ($this->howManyDaysInTheFuture > 6) {
            return false;
        }

        if ($this->todaysDateOnly === $this->datePassin->toDateString()) {
            if ($this->timePassedIn->greaterThan($this->todaysTimeOnlyWithTwoHoursAdded)) {
                $this->checkTheDayAndTime();
            }
            return false;
        } else {
            $this->checkTheDayAndTime();
        }

        return true;
    }

    private function checkTheDayAndTime()
    {
        if (($this->datePassin->isMonday() || $this->datePassin->isTuesday() || $this->datePassin->isWednesday())) {
            if ($this->timePassedIn->between($this->earlierestOpeningTime, Carbon::parse('18:00:00'))) {
                return true;
            }
            return false;
        }
        if (($this->datePassin->isThursday() || $this->datePassin->isFriday())) {
            if ($this->timePassedIn->between($this->earlierestOpeningTime, $this->leastestClosingTime)) {
                return true;
            }
            return false;
        }
        if ($this->datePassin->isSaturday()) {
            if ($this->timePassedIn->between($this->earlierestOpeningTime, Carbon::parse('12:30:00'))) {
                return true;
            }
            return false;
        }
    }
}
