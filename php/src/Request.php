<?php

namespace VognitionLib;


class Request
{

    /**
     * @var Hostname
     */
    protected $host;

    /**
     * @var Portnumber for the request
     */
    protected $port;

    /**
     * @var GET or POST
     */
    protected $method;

    /**
     * @var Path after the hostname
     */
    protected $path;

    /**
     * @var Request Parameters in array format (e.g. key => value for each parameter)
     */
    protected  $params = array();

    /**
     * @param null $host
     * @param null $port
     * @param null $method
     * @param null $path
     * @param null array $params
     */
    public function __construct(
        $host = null,
        $port = null,
        $method = null,
        $path = null,
        array $params = array()
    )
    {
        $this->setupRequest(
            $host,
            $port,
            $method,
            $path,
            $params
        );
    }

    /**
     * @param null $host
     * @param null $port
     * @param null $method
     * @param null $path
     * @param null array $params
     */
    public function setupRequest(
        $host = null,
        $port = null,
        $method = null,
        $path = null,
        array $params = array()
    )
    {
        $this->setHost($host);
        $this->setMethod($method);
        $this->setPort($port);
        $this->setPath($path);
        $this->setParams($params);
    }

    //ADD VALIDATION CODE FOR MEMBER VARIABLES HERE

    /**
     * @param mixed $host
     */
    public function setHost($host)
    {
        $this->host = $host;
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param mixed $method
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param array params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $port
     */
    public function setPort($port)
    {
        $this->port = $port;
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }


}