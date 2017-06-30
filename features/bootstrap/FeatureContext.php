<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Tests\TestCase;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends TestCase implements Context {
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct() {
    }

     /**
     * @Given I am on the homepage
     */
    public function iAmOnTheHomepage() {
        $response = $this->get('/');
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * @Then I should see :arg1
     */
    public function iShouldSee($arg1) {
        $this->assertContains($arg1, $this->content);
    }

}
