<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Create;

use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;
use Src\Shared\Domain\CommandHandler;

final class CreateUserCommandHandler implements CommandHandler
{
    private $createUserUseCase;

    public function __construct(CreateUserUseCase $createUserUseCase)
    {
        $this->createUserUseCase = $createUserUseCase;
    }

    public function __invoke(CreateUserCommand $command): void
    {
        $name              = new UserName($command->name());
        $email             = new UserEmail($command->email());
        $emailVerifiedDate = new UserEmailVerifiedDate($command->emailVerifiedDate());
        $password          = new UserPassword($command->password());
        $rememberToken     = new UserRememberToken($command->rememberToken());

        $this->createUserUseCase->__invoke($name, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}
