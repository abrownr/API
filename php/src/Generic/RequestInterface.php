<?php

namespace VognitionLib;

interface RequestInterface
{
    public function makeRequest();
    public function makePostRequest();
    public function makeGetRequest();
    public function getRawResponse();
    public function getDecodedJSONResponse();
}