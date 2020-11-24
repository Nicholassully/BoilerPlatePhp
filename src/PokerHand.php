<?php

declare(strict_types=1);

namespace BoilerPlatePhp;

class PokerHand
{

//    public function __construct()
//    {
//
//    }

    /**
     * @param array $hand
     * @return int|string
     */
    public function checkTheHand(array $hand)
    {
        $handWithValueAndSuit = [];

        foreach ($hand as $card)
        {
            $handWithValueAndSuit[] = new Card($card);
        }

        sort($handWithValueAndSuit);

        $cardCount = [];

        foreach ($handWithValueAndSuit as $item)
        {
            if(!array_key_exists($item->value, $cardCount))
            {
                $cardCount[$item->value] = 1;
                continue;
            }

            $cardCount[$item->value]++;
        }

        if($this->isThreeOfAKind($cardCount))
        {
            return 'Three of a kind';
        }

        $checkForAtLeastOnePair = $this->pairOrTwo($cardCount);

        if($checkForAtLeastOnePair)
        {
            return $checkForAtLeastOnePair === 1 ? 'Pair' : 'Two Pair';
        }

        if ($this->isStraight($handWithValueAndSuit))
        {
            return 'Straight';
        }

        if ($this->isFlush($handWithValueAndSuit))
        {
            return 'Flush';
        }

        return $handWithValueAndSuit[4]->value;
    }

    private function isThreeOfAKind(array $cardCount): bool
    {
       return in_array(3, $cardCount);
    }

    private function pairOrTwo(array $cardCount): int
    {
        if (in_array(2, $cardCount))
        {
            $twoPair = array_count_values($cardCount);

            if (in_array(2, $twoPair))
            {
                return 2;
            }

            return 1;
        }
        return 0;
    }

    private function isStraight(array $handWithValueAndSuit): bool
    {
        $playersHand = [];

        foreach ($handWithValueAndSuit as $i => $card) {
            if (count($playersHand) === 0) {
                $playersHand[$i] = $card->value;
                continue;
            }

            if (($playersHand[$i - 1] - $card->value) === -1) {
                $playersHand[$i] = $card->value;
                continue;
            }
            break;
        }

        if(count($playersHand) === 5) {
            return true;
        }

        return false;
    }

    private function isFlush(array $handWithValueAndSuit)
    {
        $playersHand = '';

        foreach ($handWithValueAndSuit as $card) {
            if ($playersHand === '') {
                $playersHand = $card->suit;
                continue;
            }

            if ($playersHand !== $card->suit) {
               return false;
            }
        }

        return true;
    }
}
