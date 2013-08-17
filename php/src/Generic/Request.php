<?php

namespace VognitionLib;

require_once('RequestInterface.php');

class Request implements RequestInterface
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

    public function makeRequest()
    {
        $this->validateRequest();
    }

    public function makePostRequest()
    {
        $this->validateRequest(true);
    }

    public function makeGetRequest()
    {
        $this->validateRequest(true);
    }

    public function getRawResponse()
    {

    }

    public function getDecodedJSONResponse()
    {

    }

    /**
     * A simple method to validate that the hostname and method are defined.
     * Other elements (path, params, port) are all optional, and have set defaults,
     * so there is not need to validate them.
     *
     * @param bool $isMethodDefined
     * @return bool
     * @throws \DomainException
     */
    private function validateRequest($isMethodDefined = false)
    {
        if($isMethodDefined != true && $this->getMethod() == null)
        {
            throw new \DomainException('No Method is defined for request');
        }
        else
        {
            if($this->getHost() == null)
            {
                throw new \DomainException('No host defined for request');
            }
        }
        return true;
    }

    /**
     * @param $host
     * @throws \InvalidArgumentException
     * @throws \LengthException
     */
    public function setHost($host)
    {
        $hostPiece = explode('.', $host);
        $hostProtocol = substr($hostPiece[0], 0, 7);

        if($hostProtocol != 'http://' && !is_null($host))
        {
            throw new \InvalidArgumentException('Protocol in host is invalid. Host must start with http://');
        }
        elseif((strlen($hostPiece[count($hostPiece) - 1]) < 2) && !is_null($host))
        {
            throw new \LengthException('TLD in host is too short. TLD must be at least 2 characters long');
        }
        else
        {
            $this->host = $host;
        }
    }

    /**
     * @return mixed
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @param $method
     * @throws \InvalidArgumentException
     */
    public function setMethod($method)
    {
        if(!is_null($method) && $method != 'GET' && $method != 'POST')
        {
            throw new \InvalidArgumentException('Valid parameters for \'method\' are \'GET\' or \'POST\'');
        }
        else
        {
            $this->method = $method;
        }
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param array $params
     */
    public function setParams(array $params)
    {
        $this->params = $params;
    }

    /**
     * @return array|Request
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param $path
     * @throws \InvalidArgumentException
     */
    public function setPath($path)
    {
        if(substr($path,0,1) != '/' && !is_null($path))
        {
            throw new \InvalidArgumentException('Path must start with a slash');
        }
        else
        {
            $this->path = $path;
        }
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param $port
     * @throws \RangeException
     * @throws \InvalidArgumentException
     */
    public function setPort($port)
    {
        if(is_numeric($port) || is_null($port))
        {
            if(($port < 1025 || $port > 65535) && !is_null($port))
            {
                throw new \RangeException(
                    'Port Number \'' . $port . '\' is out of range. Valid range is 1025 - 65535'
                );
            }
            else
            {
                $this->port = $port;
            }
        }
        else
        {
            throw new \InvalidArgumentException('Port Number must be numeric');
        }
    }

    /**
     * @return mixed
     */
    public function getPort()
    {
        return $this->port;
    }
}