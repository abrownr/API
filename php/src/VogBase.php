<?php

namespace VognitionLib;


class VogBase {

    /**
     * @var - The hostname used for the vognition calls
     */
    protected $vogHostname;

    /**
     * @var - The port number for the vognition calls (default:26900)
     */
    protected $vogPortNumber;

    /**
     * @var - The application key
     */
    protected $vogAppkey;

    /**
     * @var - The application secret
     */
    protected $vogAppsecret;

    /**
     * @var - The Consumer key
     */
    protected $vogConkey;

    /**
     * @var - The Consumer secret
     */
    protected $vogConsecret;

    /**
     * @param null $hostname
     * @param null $portnumber
     * @param null $appkey
     * @param null $appsecret
     * @param null $conkey
     * @param null $consecret
     *
     * Optionally allow the object to be initalized on construction, otherwise default the variables
     */
    function __construct(
        $hostname = null,
        $portnumber = null,
        $appkey = null,
        $appsecret = null,
        $conkey = null,
        $consecret = null
    )
    {
        $this->vogDoConfigure(
            $hostname,
            $portnumber,
            $appkey,
            $appsecret,
            $conkey,
            $conkey
        );
    }


    /**
     * @param $hostname
     * @param $portnumber
     * @param $appkey
     * @param $appsecret
     * @param $conkey
     * @param $consecret
     *
     * Method dose a quick setup for all of the request variables.
     */
    public function vogDoConfigure(
        $hostname,
        $portnumber,
        $appkey,
        $appsecret,
        $conkey,
        $consecret
    )
    {
        $this->setVogHostname($hostname);
        //Default the port to 26900 is a null parameter was passed
        $this->setVogPortNumber((is_null($portnumber)) ? 26900 : $portnumber);

        //Set the application tokens
        $this->setVogAppkey($appkey);
        $this->setVogAppsecret($appsecret);

        //Set the consumer tokens
        $this->setVogConkey($conkey);
        $this->setVogConsecret($consecret);
    }

    /**
     * @param mixed $vogAppkey
     */
    public function setVogAppkey($vogAppkey)
    {
        $this->vogAppkey = $vogAppkey;
    }

    /**
     * @return mixed
     */
    public function getVogAppkey()
    {
        return $this->vogAppkey;
    }

    /**
     * @param mixed $vogAppsecret
     */
    public function setVogAppsecret($vogAppsecret)
    {
        $this->vogAppsecret = $vogAppsecret;
    }

    /**
     * @return mixed
     */
    public function getVogAppsecret()
    {
        return $this->vogAppsecret;
    }

    /**
     * @param mixed $vogConkey
     */
    public function setVogConkey($vogConkey)
    {
        $this->vogConkey = $vogConkey;
    }

    /**
     * @return mixed
     */
    public function getVogConkey()
    {
        return $this->vogConkey;
    }

    /**
     * @param mixed $vogConsecret
     */
    public function setVogConsecret($vogConsecret)
    {
        $this->vogConsecret = $vogConsecret;
    }

    /**
     * @return mixed
     */
    public function getVogConsecret()
    {
        return $this->vogConsecret;
    }

    /**
     * @param mixed $vogHostname
     */
    public function setVogHostname($vogHostname)
    {
        $this->vogHostname = $vogHostname;
    }

    /**
     * @return mixed
     */
    public function getVogHostname()
    {
        return $this->vogHostname;
    }

    /**
     * @param mixed $vogPortNumber
     */
    public function setVogPortNumber($vogPortNumber)
    {
        $this->vogPortNumber = $vogPortNumber;
    }

    /**
     * @return mixed
     */
    public function getVogPortNumber()
    {
        return $this->vogPortNumber;
    }
}