<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $dateForCallBack;

    private string $timeTheyCalled;

    public function __construct(string $dateForCallBack, string $timeTheyCalled)
    {
        $this->dateForCallBack = $dateForCallBack;
        $this->timeTheyCalled = $timeTheyCalled;
    }

    public function getDateForCallBack(): string
    {
        return $this->dateForCallBack;
    }

    public function getTimeTheyCalled(): string
    {
        return $this->timeTheyCalled;
    }

}
