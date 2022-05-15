<?php


namespace eliechaaban\Ooreedo\Soap;

use SoapClient;
use SoapFault;


class Client extends SoapClient {
    private $wsdl    = "https://messaging.ooredoo.qa/bms/soap/Messenger.asmx?wsdl";
    private $options = ['trace' => true, 'exceptions' => true];

    /**
     * Client constructor.
     *
     * @param array|null $options
     *
     * @throws SoapFault
     */
    public function __construct(array $options = []) {
        parent::__construct($this->wsdl, array_merge($this->options, $options));
    }
}
