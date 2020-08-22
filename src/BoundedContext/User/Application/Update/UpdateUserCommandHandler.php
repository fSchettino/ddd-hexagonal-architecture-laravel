<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Update;

use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmailVerifiedDate;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\BoundedContext\User\Domain\ValueObjects\UserPassword;
use Src\BoundedContext\User\Domain\ValueObjects\UserRememberToken;
use Src\Shared\Domain\CommandHandler;

final class UpdateUserCommandHandler implements CommandHandler
{
    private $updateUserUseCase;

    public function __construct(UpdateUserUseCase $updateUserUseCase)
    {
        $this->updateUserUseCase = $updateUserUseCase;
    }

    public function __invoke(UpdateUserCommand $command): void
    {
        $id                = new UserId($command->id());
        $name              = new UserName($command->name());
        $email             = new UserEmail($command->email());
        $emailVerifiedDate = new UserEmailVerifiedDate($command->emailVerifiedDate());
        $password          = new UserPassword($command->password());
        $rememberToken     = new UserRememberToken($command->rememberToken());

        $this->updateUserUseCase->__invoke($id, $name, $email, $emailVerifiedDate, $password, $rememberToken);
    }
}
