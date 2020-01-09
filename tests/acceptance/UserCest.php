<?php namespace App\Tests;
use App\Tests\AcceptanceTester;

class UserCest
{
    public function _before(AcceptanceTester $I)
    {

    }

    // tests
    public function trySuccessLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'nanashi4781@gmail.com');
        $I->fillField('password', 'alaji');
        $I->click('Valider');
        $I->see('Home');

    }
    public function tryFailLogin(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('email', 'faux@gmail.com');
        $I->fillField('password', 'aaa');
        $I->click('Valider');
        $I->see('Email could not be found.');

    }
}
