<?php


namespace eliechaaban\Ooreedo\Soap\Services;


use eliechaaban\Ooreedo\Soap\Client;
use eliechaaban\Ooreedo\Soap\Models\SoapUser;
use eliechaaban\Ooreedo\Soap\Requests\GetSmsStatusRequest;
use eliechaaban\Ooreedo\Soap\Requests\SendSMSRequest;
use eliechaaban\Ooreedo\Soap\Responses\GetSmsStatusResponse;
use eliechaaban\Ooreedo\Soap\Responses\SendSMSResponse;
use Exception;
use RuntimeException;
use SoapFault;

class Message {
    private $soapUser = null;
    private $client;

    /**
     * Message constructor.
     *
     * @param SoapUser|null $soapUser
     *
     * @throws SoapFault
     */
    public function __construct(SoapUser $soapUser = null) {
        $this->soapUser = $soapUser;
        $this->client   = new Client(['classmap' => ['SendSms'              => SendSMSRequest::class,
                                                     'SendSmsResponse'      => SendSMSResponse::class,
                                                     'GetSmsStatus'         => GetSmsStatusRequest::class,
                                                     "GetSmsStatusResponse" => GetSmsStatusResponse::class]]);
    }

    /**
     * @param SendSMSRequest $sendSMSRequest
     *
     * @return mixed
     * @throws Exception
     */
    public function sendSms(SendSMSRequest $sendSMSRequest) {
        try {
            if(empty($sendSMSRequest->user) && empty($this->soapUser)) {
                throw new RuntimeException("Soap User Details not set");
            }
            if(empty($sendSMSRequest->user) && !empty($this->soapUser)) {
                $sendSMSRequest->user = $this->soapUser;
            }
            return $this->client->__soapCall("SendSms", ["SendSms" => $sendSMSRequest]);
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @param GetSmsStatusRequest $getSmsStatusRequest
     *
     * @return mixed
     * @throws Exception
     */
    public function getSmsStatus(GetSmsStatusRequest $getSmsStatusRequest) {
        try {
            if(empty($getSmsStatusRequest->user) && empty($this->soapUser)) {
                throw new RuntimeException("Soap User Details not set");
            }
            if(empty($getSmsStatusRequest->user) && !empty($this->soapUser)) {
                $getSmsStatusRequest->user = $this->soapUser;
            }
            return $this->client->__soapCall("GetSmsStatus", ["GetSmsStatus" => $getSmsStatusRequest]);
        } catch(Exception $exception) {
            throw $exception;
        }
    }
}
