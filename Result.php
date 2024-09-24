<?php

namespace App\Results;

use Exception;

/**
 * @template T
 */
class Result
{
    protected bool $isSuccess;

    protected ?Error $error = null;

    /** @var T */
    protected mixed $data = null;

    /**
     * @param  T  $data
     *
     * @throws Exception
     */
    public function __construct(bool $isSuccess, ?Error $error = null, mixed $data = null)
    {
        if ($isSuccess && $error) {
            throw new Exception('Results cannot be successful and have an error at the same time');
        }

        $this->isSuccess = $isSuccess;
        $this->error = $error;
        $this->data = $data;
    }

    /**
     * @param  T  $data
     * @return Result<T>
     *
     * @throws Exception
     */
    public static function success(mixed $data = null): Result
    {
        return new self(isSuccess: true, data: $data);
    }

    /**
     * @return Result<T>
     *
     * @throws Exception
     */
    public static function failure(Error $error): Result
    {
        return new self(isSuccess: false, error: $error);
    }

    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    public function isFailure(): bool
    {
        return ! $this->isSuccess;
    }

    public function getError(): Error
    {
        return $this->error;
    }

    /**
     * @return T
     */
    public function getData(): mixed
    {
        return $this->data;
    }
}
