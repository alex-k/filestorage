<?php


class CLICest
{

    /** @var string */
    private $filename;

    /** @var  string */
    private $text;

    public function _before(FunctionalTester $I)
    {
    }

    public function _after(FunctionalTester $I)
    {
    }


    // tests

    public function failWriteWithEmptyFilename(FunctionalTester $I)
    {
        $I->runShellCommand("echo \"{$this->text}\" | php app/write.php", false);
        $I->seeResultCodeIsNot(0);
    }

    public function failRead2WithEmptyFilename(FunctionalTester $I)
    {
        $I->runShellCommand("php app/read.php", false);
        $I->seeResultCodeIsNot(0);
    }

    public function writeFile(FunctionalTester $I)
    {
        $this->filename = uniqid() . '.txt';
        $this->text = uniqid();

        $I->runShellCommand("echo \"{$this->text}\" | php app/write.php {$this->filename}");
        $I->seeResultCodeIs(0);
    }

    public function readFile(FunctionalTester $I)
    {
        $I->runShellCommand("php app/read.php {$this->filename}");
        $I->seeResultCodeIs(0);
        $I->seeInShellOutput($this->text);
    }

    public function readAnotherFile(FunctionalTester $I)
    {
        $another_file = uniqid().'.txt';
        $I->runShellCommand("php app/read.php {$another_file}");
        $I->seeResultCodeIs(0);
        $I->dontSeeInShellOutput($this->text);
    }
}
