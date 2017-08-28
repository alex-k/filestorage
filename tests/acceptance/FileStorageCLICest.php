<?php


class FileStorageCLICest
{
    public function _before(AcceptanceTester $I)
    {
    }

    public function _after(AcceptanceTester $I)
    {
    }

    //data provider
    /**
     * @return array
     */
    protected function dataProvider() // alternatively, if you want the function to be public, be sure to prefix it with `_`
    {
        $data = [];

        for($i=0; $i<10;$i++) {
            array_push($data,['filename'=>uniqid().".txt", 'text'=>uniqid()]);
        }

        return $data;
    }

    // tests
    /**
     * @dataprovider dataProvider
     */
    public function commandLineInterfaceTest(AcceptanceTester $I, \Codeception\Example $example)
    {
        $text = $example['text'];
        $filename = $example['filename'];
        $I->runShellCommand("echo \"{$text}\" | php app/write.php {$filename}");
        $I->runShellCommand("php app/read.php {$filename}");
        $I->seeInShellOutput($text);
        $I->runShellCommand("php app/delete.php {$filename}");
    }

}
