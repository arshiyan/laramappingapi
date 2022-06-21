<?php

namespace App\Services;


class FetcherService
{
    public function __construct()
    {

    }

    /**
     * @param $string
     * @return string of file format json or xml or none
     */
    public function detectApiFormat($string)
    {

        if ($this->isJsonFileValid($string)) {
            return "json";
        } elseif ($this->isXMLFileValid($string)) {
            return "xml";
        } else {
            return "none";
        }

    }

    /**
     * @param $jsonString content of json string
     * @return bool
     */
    private function isJsonFileValid($jsonString)
    {
        json_decode($jsonString);
        return (json_last_error() == JSON_ERROR_NONE);
    }


    /**
     * @param string $xmlFilename content of XML
     * @param string $version 1.0
     * @param string $encoding utf-8
     * @return bool
     */
    public function isXMLFileValid($xmlString, $version = '1.0', $encoding = 'utf-8')
    {
        if (@simplexml_load_string($xmlString)) {
            return true;
        } else {
            return false;
        }

    }
}
