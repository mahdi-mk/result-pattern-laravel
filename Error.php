<?php

namespace App\Results;

class Error
{
    protected string $code;

    protected string $message;

    public function __construct(string $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    public static function make(string $code, string $message): static
    {
        return new static($code, $message);
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}
