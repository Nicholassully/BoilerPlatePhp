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
        $this->value = $this->extractValue($card[0]);
        $this->suit = $card[0] === '1' ? $card[2] : $card[1];
    }

    public function __compareTo($cardPassedIn): int
    {
        return $this->value - $cardPassedIn->value;
    }

    private function extractValue(string $card) {
        switch ($card[0]){
            case '1':
                return 10;
            case 'J':
                return 11;
            case 'Q':
                return 12;
            case 'K':
                return 13;
            case 'A':
                return 14;
            default:
                return intval($card[0]);
        }
    }
}
