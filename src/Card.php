<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

class Card
{
    /**
     * @var int
     */
    public $value;

    /**
     * @var string
     */
    public $suit;

    public function __construct($card)
    {
        $this->value =  intval($card[0]);
        $this->suit = $card[1];
    }

    public function __compareTo($cardPassedIn): int
    {
        return $this->value - $cardPassedIn->value;
    }
}
