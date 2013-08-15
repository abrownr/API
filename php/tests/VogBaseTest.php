<?php

namespace VognitionLib;

use VognitionLib\BaseTest;
use VognitionLib\VogBase;

class VogBaseTest extends BaseTest
{

    /**
     * @var VogBase
     */
    private $vogBase;

    private function initalize()
    {
        $this->vogBase = new VogBase();
    }

    public function testConstructor()
    {
        $this->initalize();

        //Test that the inital port number is set
        $this->assertEquals(26900, $this->vogBase->getVogPortNumber());
    }


    public function testVogDoConfigure()
    {
        $this->assertTrue(false);
    }

    public function testTest()
    {
        $this->assertTrue(true);
    }
}
