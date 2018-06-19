<?php


class FirstCest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    // tests
    public function tryToTest(AcceptanceTester $I)
    {
      $I->wantTo('test the testing');
      $I->amOnPage('/');
      $I->dontSee('Error');
      $I->see('Apache2 Ubuntu Default Page');
    }
}
