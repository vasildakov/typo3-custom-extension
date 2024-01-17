<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\MinkExtension\Context\MinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends MinkContext implements Context
{
    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given Given I am on "/"
     */
    public function visit($page): void
    {
        $this->visitPath($page);
    }

    /**
     * @Given The response status code should be :statusCode
     * @throws \Behat\Mink\Exception\ExpectationException
     */
    public function theResponseStatusCodeShouldBe($statusCode): void
    {
        $this->assertSession()->statusCodeEquals($statusCode);
    }
}
