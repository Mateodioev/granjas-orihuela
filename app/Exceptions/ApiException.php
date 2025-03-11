<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function getAsArray(): array
    {
        return [
            'ok' => false,
            'error' => [
                'message' => $this->getMessage(),
                'code' => $this->getCode(),
            ]
        ];
    }
}
