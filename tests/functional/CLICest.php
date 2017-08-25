<?php


class CLICest
{
    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }

    // tests
    public function writeFile(FunctionalTester $I)
    {
              $I->runShellCommand('echo "123" | php app/index.php 123.txt');
              $I->seeResultCodeIs(0);
    }
}
