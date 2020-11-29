<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

use Carbon\Carbon;

class CallBack
{
    private string $dateForCallBack;

    public function __construct(string $dateForCallBack)
    {
        $this->dateForCallBack = $dateForCallBack;
    }

    public function getDateForCallBack(): string
    {
        return $this->dateForCallBack;
    }

}
