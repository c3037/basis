<?php

namespace c3037\c3037\Tests\Acceptance;

use AcceptanceTester;

/** Class GitHubCest. */
class GitHubCest
{
    /** @param AcceptanceTester $I */
    public function _before(AcceptanceTester $I)
    {
    }

    /** @param AcceptanceTester $I */
    public function _after(AcceptanceTester $I)
    {
    }

    /**
     * @param AcceptanceTester $I
     */
    public function tryToTest(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('GitHub');
    }
}
