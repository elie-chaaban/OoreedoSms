<?php


namespace eliechaaban\Ooreedo;


use eliechaaban\Ooreedo\Soap\Models\SoapUser;
use eliechaaban\Ooreedo\Soap\Requests\GetSmsStatusRequest;
use eliechaaban\Ooreedo\Soap\Requests\SendSMSRequest;
use eliechaaban\Ooreedo\Soap\Services\Message;
use Exception;
use SoapFault;

class Messenger {
    private $soapUser = null;
    private $originator;

    /**
     * Messenger constructor.
     *
     * @param        $customerID
     * @param        $name
     * @param        $password
     * @param        $originator
     * @param string $language
     */
    public function __construct($customerID, $name, $password, $originator, $language = 'en') {
        $this->soapUser   = new SoapUser($customerID, $name, $password, $language);
        $this->originator = $originator;
    }

    /**
     * @param       $smsText
     * @param       $recipientPhone
     * @param null  $deliveryTime
     * @param false $arabic
     *
     * @return mixed
     * @throws Exception|SoapFault
     */
    public function sendSMS($smsText, $recipientPhone, $deliveryTime = null, $arabic = false) {
        try {
            $message                        = new Message($this->soapUser);
            $sendSmsRequest                 = new SendSMSRequest($arabic);
            $sendSmsRequest->smsText        = $smsText;
            $sendSmsRequest->originator     = $this->originator;
            $sendSmsRequest->recipientPhone = $recipientPhone;
            $sendSmsRequest->defDate        = $deliveryTime;
            return $message->sendSms($sendSmsRequest);
        } catch(Exception $exception) {
            throw $exception;
        }
    }

    /**
     * @param      $transactionID
     * @param bool $detailed
     *
     * @return mixed
     * @throws Exception|SoapFault
     */
    public function getSMSStatus($transactionID, $detailed = true) {
        try {
            $message             = new Message($this->soapUser);
            $getSmsStatusRequest = new GetSmsStatusRequest($transactionID);
            return $message->getSmsStatus($getSmsStatusRequest);
        } catch(Exception $exception) {
            throw $exception;
        }
    }
}
