<?php

namespace Mubiridziri\Geocenter\Exception;

use Mubiridziri\Geocenter\Model\Error;

class DecoderException extends \Exception
{
    private Error $errorModel;

    public function __construct($message = "", Error $errorModel = null, $code = 0, \Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errorModel = $errorModel;
    }

    /**
     * @return Error
     */
    public function getErrorModel(): Error
    {
        return $this->errorModel;
    }
}
