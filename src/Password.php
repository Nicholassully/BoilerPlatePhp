<?php

declare(strict_types=1);

class Password
{

    public function isPasswordValid(string $password): string
    {
        $IsEightOrMoreCharactersResult = $this->IsEightOrMoreCharacters($password);
        $HasAtLeastOneCapitalLetterResult = $this->HasAtLeastOneCapitalLetter($password);
        $HasAtLeastOneLowerCaseLetterResult = $this->HasAtLeastOneLowerCaseLetter($password);
        $HasAtLeastOneNumberResult = $this->HasAtLeastOneNumber($password);
        $HasAtLeastOneUnderScoreResult = $this->HasAtLeastOneUnderScore($password);

        if (
            $IsEightOrMoreCharactersResult &&
            $HasAtLeastOneCapitalLetterResult &&
            $HasAtLeastOneLowerCaseLetterResult &&
            $HasAtLeastOneNumberResult &&
            $HasAtLeastOneUnderScoreResult
        ) {
            return "Valid";
        }

        return "InValid";
    }

    public function IsEightOrMoreCharacters(string $password): bool
    {
        if (strlen($password) >= 8) {
            return true;
        }
        return false;
    }

    public function HasAtLeastOneCapitalLetter(string $string): bool
    {
        if (preg_match("/[A-Z]/", $string) !== 0) {
            return true;
        }
        return false;
    }

    public function HasAtLeastOneLowerCaseLetter(string $string): bool
    {
        if (preg_match("/[a-z]/", $string) !== 0) {
            return true;
        }
        return false;
    }

    public function HasAtLeastOneNumber(string $string): bool
    {
        if (preg_match("/[0-9]/", $string) !== 0) {
            return true;
        }
        return false;
    }

    public function HasAtLeastOneUnderScore(string $string): bool
    {
        if (preg_match("/[_]/", $string) !== 0) {
            return true;
        }
        return false;
    }
}
