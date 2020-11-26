<?php

declare(strict_types=1);

use BoilerPlatePhp\PokerHand;
use PHPUnit\Framework\TestCase;

final class PokerHandTest extends TestCase
{
    /**
     * @var PokerHand
     */
    private PokerHand $pokerHand;

    protected function setUp(): void
    {
        $this->pokerHand = new PokerHand;
    }

    public function test_get_highest_card_from_input(): void
    {
        $hand = ['2S', '7H', '4S', '5S', '3S'];
        self::assertEquals(7, $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_a_pair(): void
    {
        $hand = ['2H', '3S', '4S', '5S', '2H'];
        self::assertEquals('Pair', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_two_pair(): void
    {
        $hand = ['2H', '2S', '3S', '3S', '4S'];
        self::assertEquals('Two Pair', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_three_of_a_kind(): void
    {
        $hand = ['2H', '2S', '2S', '3H', '4H'];
        self::assertEquals('Three of a kind', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_straight(): void
    {
        $hand = ['2H', '3S', '4H', '5S', '6S'];
        self::assertEquals('Straight', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_straight_not_in_order(): void
    {
        $hand = ['6S', '3H', '4S', '5H', '2S'];
        self::assertEquals('Straight', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_flush(): void
    {
        $hand = ['7H', '3H', '4H', '5H', '2H'];
        self::assertEquals('Flush', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_full_house(): void
    {
        $hand = ['7H', '7S', '7D', '5H', '5D'];
        self::assertEquals('Full house', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_full_of_a_kind(): void
    {
        $hand = ['7H', '7S', '7D', '7C', '5D'];
        self::assertEquals('Four of a kind', $this->pokerHand->checkTheHand($hand));
    }

    public function test_get_straight_flush(): void
    {
        $hand = ['JH', '10H', '9H', '8H', 'QH'];
        self::assertEquals('Straight flush', $this->pokerHand->checkTheHand($hand));
    }

}
