<?php

namespace VognitionLib;

require_once('src/Request.php');

use VognitionLib\BaseTest;
use VognitionLib\Request;

class RequestTest extends BaseTest
{

    /**
     * @var Request
     */
    private $request;

    /**
     *  Create an object to test against
     */
    private function initalize()
    {
        $this->request = new Request;
    }

    /**
     * Check that the contructor is starting nulled out
     */
    public function testConstructor()
    {
        $this->initalize();

        $this->assertNull($this->request->getHost());
        $this->assertNull($this->request->getMethod());
        $this->assertNull($this->request->getPort());
        $this->assertEmpty($this->request->getParams());
        $this->assertNull($this->request->getPath());
    }

    /**
     * Test the one shot request setup method
     */
    public function testSetupRequest()
    {
        $this->initalize();

        $params = array('key1' => 'val1', 'key2' => 'val2');

        $this->request->setupRequest(
            'Test Host',
            '8080',
            'GET',
            '/api',
            $params
        );

        $this->assertEquals('Test Host', $this->request->getHost());
        $this->assertEquals(8080, $this->request->getPort());
        $this->assertEquals('GET', $this->request->getMethod());
        $this->assertEquals('/api', $this->request->getPath());
        $this->assertEquals($params, $this->request->getParams());
    }

    /**
     * Test all fo the getters and setters for more complete code coverage
     */
    public function testGetterSetter()
    {
        $this->initalize();

        $params = array('key1' => 'val1', 'key2' => 'val2');

        $this->request->setHost('Another Host');
        $this->assertEquals('Another Host', $this->request->getHost());

        $this->request->setPort(1222);
        $this->assertEquals(1222, $this->request->getPort());

        $this->request->setMethod('POST');
        $this->assertEquals('POST', $this->request->getMethod());

        $this->request->setPath('/v2');
        $this->assertEquals('/v2', $this->request->getPath());

        $this->request->setParams($params);
        $this->assertEquals($params, $this->request->getParams());
    }

    /**
     * Check that an exception is thrown if we pass in a parameter that is invalid.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Valid parameters for 'method' are 'GET' or 'POST
     */
    public function testInvalidMethod()
    {
        $this->initalize();

        $this->request->setMethod('BROKEN');
    }

    /**
     * Check that null and the valid parameters don't throw exceptions
     */
    public function testValidMethod()
    {
        $this->initalize();

        $this->request->setMethod(null);
        $this->assertNull($this->request->getMethod());

        $this->request->setMethod('GET');
        $this->assertEquals('GET',$this->request->getMethod());

        $this->request->setMethod('POST');
        $this->assertEquals('POST',$this->request->getMethod());
    }

    /**
     * Check that an exception is thrown if we pass in a parameter that is not a number to the port property.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Port Number must be numeric
     */
    public function testNonNumericPort()
    {
        $this->initalize();

        $this->request->setPort('Not a Number');
    }

    /**
     * Check that an exception is thrown if we pass in a parameter that is out of range in the positive end
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Port Number '65536' is out of range. Valid range is 1025 - 65535
     */
    public function testLargeNumberPort()
    {
        $this->initalize();

        $this->request->setPort(65536);
    }

    /**
     * Check that an exception is thrown if we pass in a parameter that is out of range in the negative end.
     *
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage Port Number '1024' is out of range. Valid range is 1025 - 65535
     */
    public function testNegativePort()
    {
        $this->initalize();

        $this->request->setPort(1024);
    }

    /**
     * Check that the port can be set to a number or null.
     */
    public function testValidPort()
    {
        $this->initalize();

        $this->request->setPort('56712');
        $this->assertEquals(56712, $this->request->getPort());

        $this->request->setPort(null);
        $this->assertNull($this->request->getPort());
    }

    public function testParameters()
    {
        //TEST FOR PARAMETERE TO BE 'PARAMETERIZED' PROPERLY
    }

    public function testHost()
    {
        //CHECK THAT THE HOST IS VALID
    }

    public function testPath()
    {
        //CHECK THAT THE PATH IS A VALID PATH
    }
}