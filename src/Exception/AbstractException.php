<?php

declare(strict_types=1);

namespace App\Exception;

use Exception;
use Throwable;

abstract class AbstractException extends Exception
{
    /**
     * @var array|mixed
     */
    private $errors;

    /**
     * {@inheritdoc}
     */
    public function __construct($errors = [], $message = '', $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->errors = $errors;
    }

    /**
     * @return array|mixed
     */
    public function getErrors()
    {
        return $this->errors;
    }
}
