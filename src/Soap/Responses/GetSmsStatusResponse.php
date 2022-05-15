<?php


namespace eliechaaban\Ooreedo\Soap\Responses;


use eliechaaban\Ooreedo\Xml\XmlElement;
use Exception;
use SimpleXMLElement;

class GetSmsStatusResponse {
    public $GetSmsStatusResult;

    /**
     * @return XmlElement
     * @throws Exception
     */
    public function getStatistics() {
        return new XmlElement($this->GetSmsStatusResult->Statistics->any);
    }

    /**
     * @return XmlElement
     * @throws Exception
     */
    public function getDetails() {
        return new XmlElement($this->GetSmsStatusResult->Details->any);
    }

    /**
     * @param $name
     *
     * @return mixed
     */
    public function __get($name) {
        return $this->GetSmsStatusResult->{$name};
    }
}
