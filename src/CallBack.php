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
        $timePeriod = $this->timePeriod;
        $formatDate = 'd/m/Y';

        if ($this->isValidFormat($this->dateCalled, $formatDate))
        {
            $dateCalled = Carbon::createFromFormat($formatDate, $this->dateCalled);
            $dateToCallBack = $dateCalled->addDays($this->furtureAmount);


//            $weekMap = [
//                0 => 'SU',
//                1 => 'MO',
//                2 => 'TU',
//                3 => 'WE',
//                4 => 'TH',
//                5 => 'FR',
//                6 => 'SA',
//            ];
//
            // what day is it?
//            $dayOfTheWeek = $dateToCallBack->isMonday();
//            $weekday = $weekMap[$dayOfTheWeek];

            //is it two hours ahead
//            $timeForCallback = Carbon::parse('19:20:20');
//            $timeNow = Carbon::now()->addHours(2);
//            $isOkToCallBack = $timeForCallback->greaterThan($timeNow);
//
//            var_dump($isOkToCallBack);

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
