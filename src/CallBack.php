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
        $isTodayDateBeforeOnePassedIn = (new Carbon('now'))->toDateString();

        if ($this->getDateForCallBack() < $isTodayDateBeforeOnePassedIn)
        {
            return false;
        }
        return true;
    }

}
