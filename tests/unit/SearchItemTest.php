<?php


class SearchItemTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testShouldReturnItemByTitle() {

        $item = new ItemRepository();
        $item->getByCriteria();

    }

    public function testShouldReturnItemByTitle() {
        // So we could go ahead and call a controller method
        // But isn't it weird for this functionality to be in the controller?
    }

    public function testShouldReturnFalseIfNoArgumentGiven() {
        // So we could go ahead and call a controller method
        // But isn't it weird for this functionality to be in the controller?

    }
}