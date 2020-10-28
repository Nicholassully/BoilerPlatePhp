<?php

declare(strict_types=1);

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
}
