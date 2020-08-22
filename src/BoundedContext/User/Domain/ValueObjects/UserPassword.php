<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain\ValueObjects;

final class UserPassword
{
    private $value;

    public function __construct(string $password)
    {
        $this->value = $password;
    }

    public function value(): string
    {
        return $this->value;
    }
}
