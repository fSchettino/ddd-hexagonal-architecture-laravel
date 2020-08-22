<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Domain;

use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;

final class User
{
    private $name;
    private $email;
    private $emailVerifiedDate;
    private $password;
    private $rememberToken;

    public function __construct(
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    )
    {
        $this->name              = $name;
        $this->email             = $email;
        $this->emailVerifiedDate = $emailVerifiedDate;
        $this->password          = $password;
        $this->rememberToken     = $rememberToken;
    }

    public function name(): UserName
    {
        return $this->name;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }

    public function emailVerifiedDate(): UserEmailVerifiedDate
    {
        return $this->emailVerifiedDate;
    }

    public function password(): UserPassword
    {
        return $this->password;
    }

    public function rememberToken(): UserRememberToken
    {
        return $this->rememberToken;
    }

    public static function create(
        UserName $name,
        UserEmail $email,
        UserEmailVerifiedDate $emailVerifiedDate,
        UserPassword $password,
        UserRememberToken $rememberToken
    ): User
    {
        $user = new self($name, $email, $emailVerifiedDate, $password, $rememberToken);

        return $user;
    }
}
