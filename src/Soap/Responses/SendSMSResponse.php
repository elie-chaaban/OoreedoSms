<?php


namespace eliechaaban\Ooredoo\Soap\Responses;


use eliechaaban\Ooredoo\Soap\Models\SendSmsResult;
use RuntimeException;

class SendSMSResponse {
    public $SendSmsResult;

    public function __get($name) {
        return $this->SendSmsResult->{$name};
    }
}
