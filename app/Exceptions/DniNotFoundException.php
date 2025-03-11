<?php

declare(strict_types=1);

namespace App\Exceptions;

class DniNotFoundException extends ApiException
{
    public function __construct(string $dni)
    {
        parent::__construct("Dni invalido: $dni", 400);
    }
}
