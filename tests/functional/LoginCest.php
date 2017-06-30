<?php


class LoginCest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function tryToTest(FunctionalTester $I)
    {   // In Behat this would be a context
        $I->amOnPage('/');
        $I->click('Login');
        $I->see('Login');
    }
}
