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
        $timePassedIn = Carbon::parse($this->getTimeTheyWantACallBack());
        $earlierestOpeningTime = Carbon::parse('09:00:00');
        $leastestClosingTime = Carbon::parse('20:00:00');

        var_dump($timePassedIn->between($leastestClosingTime, $earlierestOpeningTime));

        if ($this->getDateForCallBack() < $todaysDateOnly) {
            return false;
        }

        if (!$timePassedIn->between($leastestClosingTime, $earlierestOpeningTime)) {
            return false;
        }
        return true;
    }

}
