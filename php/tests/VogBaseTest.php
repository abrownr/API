<?php

namespace VognitionLib;

require_once('src/VogBase.php');

use VognitionLib\BaseTest;
use VognitionLib\VogBase;

class VogBaseTest extends BaseTest
{

    /**
     * @var VogBase
     */
    private $vogBase;

    /**
     *  Create an object to test against
     */
    private function initalize()
    {
        $this->vogBase = new VogBase;
    }

    /**
     * Test the VogBase contructor's base parameters
     */
    public function testConstructor()
    {
        $this->initalize();

        //Test that the inital port number is set and that the other parameters are null
        $this->assertEquals(26900, $this->vogBase->getVogPortNumber());
        $this->assertNull($this->vogBase->getVogHostname());
        $this->assertNull($this->vogBase->getVogAppkey());
        $this->assertNull($this->vogBase->getVogAppsecret());
        $this->assertNull($this->vogBase->getVogConkey());
        $this->assertNull($this->vogBase->getVogConsecret());
    }

    /**
     * Test the configuration method
     */
    public function testVogDoConfigure()
    {
        $this->initalize();

        $this->vogBase->vogDoConfigure(
            'TEST HOST',
            '8080',
            '743824675296575y432752385689',
            '4y372f7643287yt7r382647832',
            'df78yr8732y9fyw9fg54h82w',
            'fh8gvc8387yr7328y786437264674732678yfsd87'
        );
        $this->assertEquals(8080, $this->vogBase->getVogPortNumber());
        $this->assertEquals('TEST HOST', $this->vogBase->getVogHostname());
        $this->assertEquals('743824675296575y432752385689', $this->vogBase->getVogAppkey());
        $this->assertEquals('4y372f7643287yt7r382647832', $this->vogBase->getVogAppsecret());
        $this->assertEquals('df78yr8732y9fyw9fg54h82w', $this->vogBase->getVogConkey());
        $this->assertEquals('fh8gvc8387yr7328y786437264674732678yfsd87', $this->vogBase->getVogConsecret());
    }

    /**
     * Test all fo the getters and setters for more complete code coverage
     */
    public function testGetterSetter()
    {
        $this->initalize();

        $this->vogBase->setVogHostname('DIFFERENT HOSTNAME');
        $this->assertEquals('DIFFERENT HOSTNAME', $this->vogBase->getVogHostname());

        $this->vogBase->setVogPortNumber('1234');
        $this->assertEquals('1234', $this->vogBase->getVogPortNumber());

        $this->vogBase->setVogAppkey('4384732756732856329659325723895');
        $this->assertEquals('4384732756732856329659325723895', $this->vogBase->getVogAppkey());

        $this->vogBase->setVogAppsecret('r732894632794723847328946293842');
        $this->assertEquals('r732894632794723847328946293842', $this->vogBase->getVogAppsecret());

        $this->vogBase->setVogConkey('cnjdusi9fhdufjh8uhf398yt73r68439r790234ry97324');
        $this->assertEquals('cnjdusi9fhdufjh8uhf398yt73r68439r790234ry97324', $this->vogBase->getVogConkey());

        $this->vogBase->setVogConsecret('hjfdew8uyf877e98r78972tyr9ojwi');
        $this->assertEquals('hjfdew8uyf877e98r78972tyr9ojwi', $this->vogBase->getVogConsecret());
    }

    //TODO - Maybe put some validation on Hostname and portnumber??
}
