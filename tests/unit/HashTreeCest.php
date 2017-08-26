<?php


use Alexk\Storage\FileNameGenerator\HashTree;

class HashTreeCest
{
    public function _before(UnitTester $I)
    {
    }

    public function _after(UnitTester $I)
    {
    }

    // tests
    public function testPath(UnitTester $I)
    {
        $fileNameGenerator = new HashTree('aaa.txt');
        $I->assertEquals('4/2/e/d/a/2/5/4/4/5/0/9/c/1/c/f/b/b/3/7/7/f/7/e/f/e/6/4/0/d/a/9', $fileNameGenerator->getPath());
    }
}
