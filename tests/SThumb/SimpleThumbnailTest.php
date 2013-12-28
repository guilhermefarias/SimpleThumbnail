<?php
namespace SThumb;

use SThumb\SimpleThumbnail;

class SThumbTest extends \PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        parent::setUp();
    }

    public function assertPreConditions()
    {
        $this->assertTrue(
            class_exists($class = 'SThumb\SimpleThumbnail'),
            'Class not found: ' . $class
        );
    }

    public function testInstance()
    {
        $instance = new SimpleThumbnail();
        $this->assertInstanceOf('SThumb\SimpleThumbnail', $instance);
    }
}
