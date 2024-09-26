<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class PasswordTest extends TestCase
{
    public function testIsPasswordValidReturnsFalse(): void
    {
        $password = new Password();
        self::assertSame("InValid", $password->isPasswordValid(""));
    }

    public function testIsPasswordValidReturnsTrue(): void
    {
        $password = new Password();
        self::assertSame("Valid", $password->isPasswordValid("Tr_uet5rue"));
    }

    public function testIsEightOrMoreCharactersReturnsFalse(): void
    {
        $password = new Password();
        self::assertFalse($password->IsEightOrMoreCharacters("false"));
    }

    public function testIsEightOrMoreCharactersReturnsTrue(): void
    {
        $password = new Password();
        self::assertTrue($password->IsEightOrMoreCharacters("truetrue"));
    }

    public function testHasAtLeastOneCapitalLetterReturnsFalse(): void
    {
        $password = new Password();
        self::assertFalse($password->HasAtLeastOneCapitalLetter("false"));
    }

    public function testHasAtLeastOneCapitalLetterReturnsTrue(): void
    {
        $password = new Password();
        self::assertTrue($password->HasAtLeastOneCapitalLetter("Truetrue"));
    }

    public function testHasAtLeastOneLowerCaseLetterReturnsFalse(): void
    {
        $password = new Password();
        self::assertFalse($password->HasAtLeastOneLowerCaseLetter("FALSE"));
    }

    public function testHasAtLeastOneLowerCaseLetterReturnsTrue(): void
    {
        $password = new Password();
        self::assertTrue($password->HasAtLeastOneLowerCaseLetter("Truetrue"));
    }

    public function testHasAtLeastOneNumberReturnsFalse(): void
    {
        $password = new Password();
        self::assertFalse($password->HasAtLeastOneNumber("FALSE"));
    }

    public function testHasAtLeastOneNumberReturnsTrue(): void
    {
        $password = new Password();
        self::assertTrue($password->HasAtLeastOneNumber("Tru2etrue"));
    }

    public function testHasAtLeastOneUnderScoreReturnsFalse(): void
    {
        $password = new Password();
        self::assertFalse($password->HasAtLeastOneUnderScore("FALSE"));
    }

    public function testHasAtLeastOneUnderScoreReturnsTrue(): void
    {
        $password = new Password();
        self::assertTrue($password->HasAtLeastOneUnderScore("Tru2etr_ue"));
    }
}


//public function testCanBeCreatedFromValidEmailAddress(): void
//{
//    $this->assertInstanceOf(
//        Password::class,
//        Password::fromString('user@example.com')
//    );
//}
//
//public function testCannotBeCreatedFromInvalidEmailAddress(): void
//{
//    $this->expectException(InvalidArgumentException::class);
//
//    Password::fromString('invalid');
//}
//
//public function testCanBeUsedAsString(): void
//{
//    $this->assertEquals(
//        'user@example.com',
//        Password::fromString('user@example.com')
//    );
//}