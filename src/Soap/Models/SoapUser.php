<?php


namespace eliechaaban\Ooredoo\Soap\Models;


class SoapUser {
    public $CustomerID;
    public $Name;
    public $Language;
    public $Password;

    public function __construct($customerID, $name, $password, $language) {
        $this->CustomerID = $customerID;
        $this->Name       = $name;
        $this->Password   = $password;
        $this->Language   = $language;
    }
}
