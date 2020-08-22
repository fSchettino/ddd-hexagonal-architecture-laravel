<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Update;

use DateTime;

final class UpdateUserCommand
{
    private $id;
    private $name;
    private $email;
    private $emailVerifiedDate;
    private $password;
    private $rememberToken;

    public function __construct(
        int $id,
        string $name,
        string $email,
        ?DateTime $emailVerifiedDate,
        string $password,
        ?string $rememberToken
    )
    {
        $this->id                = $id;
        $this->name              = $name;
        $this->email             = $email;
        $this->emailVerifiedDate = $emailVerifiedDate;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
    }

    public function id(): int
    {
        return $this->id;
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
