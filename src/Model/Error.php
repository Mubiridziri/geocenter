<?php

namespace Mubiridziri\Geocenter\Model;

class Error
{
    private int $code;

    private string $message;

    private ?string $verboseMessage;

    public function __construct(int $code, string $message, ?string $verboseMessage)
    {
        $this->code = $code;
        $this->message = $message;
        $this->verboseMessage = $verboseMessage;
    }

    /**
     * @return int
     */
    public function getCode(): int
    {
        return $this->code;
    }

    /**
     * @param int $code
     */
    public function setCode(int $code): void
    {
        $this->code = $code;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getVerboseMessage(): string
    {
        return $this->verboseMessage;
    }

    /**
     * @param string $verboseMessage
     */
    public function setVerboseMessage(string $verboseMessage): void
    {
        $this->verboseMessage = $verboseMessage;
    }
}
