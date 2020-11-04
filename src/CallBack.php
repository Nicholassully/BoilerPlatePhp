<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $name;

    private string $dateCalled;

    private int $furtureAmount;

    private string $timePeriod;

    public function __construct(string $name, string $dateCalled, int $furtureAmount, string $timePeriod)
    {
        $this->name = $name;
        $this->dateCalled = $dateCalled;
        $this->furtureAmount = $furtureAmount;
        $this->timePeriod = $timePeriod;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFutureDate(): string
    {
        $futureAmount = $this->furtureAmount;
        $timePeriod = $this->timePeriod;
        $formatDate = 'd/m/Y';

        if ($this->isValidFormat($this->dateCalled, $formatDate))
        {
            $dateCalled = Carbon::createFromFormat($formatDate, $this->dateCalled);
            $dateToCallBack = $dateCalled->addDays($futureAmount);

            return $dateToCallBack->format($formatDate);
        }

        return 'Call date is invalid';

    }

    public function isValidFormat($date, $formatDate): bool
    {
        return Carbon::hasFormat($date, $formatDate);
    }
}


//echo Carbon::create(2018, 2, 23, 0, 0, 0)->nextWeekday();
//switch statement
