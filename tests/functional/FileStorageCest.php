<?php


class FileStorageCest
{

    /** @var string */
    private $filename;

    /** @var  string */
    private $text;

    /**
     * FileStorageCest constructor.
     */
    public function __construct()
    {
        $this->filename = uniqid() . '.txt';
        $this->text = uniqid();
    }

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


    public function failReadWithEmptyFilename(FunctionalTester $I)
    {
        $I->runShellCommand("php app/read.php", false);
        $I->seeResultCodeIsNot(0);
    }

    public function failReadUnexistedFilename(FunctionalTester $I)
    {
        $unexisted_filename = uniqid().'.txt';
        $I->runShellCommand("php app/read.php {$unexisted_filename}", false);
        $I->seeResultCodeIsNot(0);
    }

    public function writeFile(FunctionalTester $I)
    {


        $I->runShellCommand("echo \"{$this->text}\" | php app/write.php {$this->filename}");
        $I->seeResultCodeIs(0);
    }

    public function readFile(FunctionalTester $I)
    {
        $I->runShellCommand("php app/read.php {$this->filename}");
        $I->seeResultCodeIs(0);
        $I->seeInShellOutput($this->text);
    }

    public function reWriteFile(FunctionalTester $I)
    {
        $text = uniqid();

        $I->runShellCommand("echo \"{$text}\" | php app/write.php {$this->filename}");
        $I->runShellCommand("php app/read.php {$this->filename}");
        $I->seeResultCodeIs(0);
        $I->seeInShellOutput($text);
        $I->dontSeeInShellOutput($this->text);
    }

    public function deleteFile(FunctionalTester $I) {
        $I->runShellCommand("echo \"{$this->text}\" | php app/write.php {$this->filename}");

        $I->runShellCommand("php app/delete.php {$this->filename}");
        $I->seeResultCodeIs(0);

        $I->runShellCommand("php app/read.php {$this->filename}", FALSE);
        $I->seeResultCodeIsNot(0);
        $I->dontSeeInShellOutput($this->text);
    }

    public function readAnotherFile(FunctionalTester $I)
    {
        $another_file = uniqid().'.txt';
        $I->runShellCommand("php app/read.php {$another_file}", false);
        $I->seeResultCodeIsNot(0);
        $I->dontSeeInShellOutput($this->text);
    }

}
