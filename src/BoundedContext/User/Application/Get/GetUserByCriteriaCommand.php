<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Application\Get;

use Src\Shared\Domain\Command;

final class GetUserByCriteriaCommand implements Command
{
    private $name;
    private $email;

    public function __construct(
        string $name,
        string $email
    )
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }
}
