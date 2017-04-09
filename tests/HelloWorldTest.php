<?php

/**
 * Class HelloWorldTest
 */
class HelloWorldTest extends PHPUnit_Framework_TestCase
{
    /**
     * Tests something to demonstrate that PHPUnit and Drupal are loaded
     */
    public function testHello()
    {
        $hw = new Acme\App\HelloWorld();
        $this->assertEquals("Hello World", $hw->hello("World"));
    }

}