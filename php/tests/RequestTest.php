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

    //TEST FOR VALIDATION ON THE METHOD CHOSEN

    //TEST FOR PORT NUMBER TO BE NUMERIC

    //TEST FOR PARAMETERE TO BE 'PARAMETERIZED' PROPERLY

    //CHECK THAT THE HOST IS VALID

    //CHECK THAT THE PATH IS A VALID PATH
}
