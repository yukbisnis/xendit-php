<?php

namespace Hasandotprayoga\Xendit\Exceptions;

class ApiException extends \Exception
{
    protected $errorCode;

    public function getErrorCode() 
    {
        return $this->errorCode;
    }

    public function __construct($message, $code, $errorCode)
    {
        if (!$message) {
            throw new $this('Unknown '. get_class($this));
        }
        
        parent::__construct($message, $code);
        $this->errorCode = $errorCode;
    }
}
