<?php


namespace eliechaaban\Ooreedo\Soap\Requests;


class GetSmsStatusRequest {
    public $user          = null;
    public $transactionID = null;
    public $detailed      = true;
    public function __construct($transactionID) {
        $this->transactionID = $transactionID;
    }
}
