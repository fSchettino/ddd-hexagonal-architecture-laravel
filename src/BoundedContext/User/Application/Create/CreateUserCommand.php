<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Create;

use DateTime;
use Src\Shared\Domain\Command;

final class CreateUserCommand implements Command
{
    private $name;
    private $email;
    private $emailVerifiedDate;
    private $password;
    private $rememberToken;

    public function __construct(
        string $name,
        string $email,
        ?DateTime $emailVerifiedDate,
        string $password,
        ?string $rememberToken
    )
    {
        $this->name              = $name;
        $this->email             = $email;
        $this->emailVerifiedDate = $emailVerifiedDate;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function emailVerifiedDate(): ?DateTime
    {
        return $this->emailVerifiedDate;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function rememberToken(): ?string
    {
        return $this->rememberToken;
    }
}
