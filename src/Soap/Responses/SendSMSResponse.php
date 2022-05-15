<?php


namespace eliechaaban\Ooreedo\Soap\Responses;


use eliechaaban\Ooreedo\Soap\Models\SendSmsResult;
use RuntimeException;

class SendSMSResponse {
    public $SendSmsResult;

    public function __get($name) {
        return $this->SendSmsResult->{$name};
    }
}
