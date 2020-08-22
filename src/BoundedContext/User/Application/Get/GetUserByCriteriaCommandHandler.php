<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Get;

use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;
use Src\Shared\Domain\CommandHandler;

final class GetUserByCriteriaCommandHandler implements CommandHandler
{
    private $getUserByCriteriaUseCase;

    public function __construct(GetUserByCriteriaUseCase $getUserByCriteriaUseCase)
    {
        $this->getUserByCriteriaUseCase = $getUserByCriteriaUseCase;
    }

    public function __invoke(GetUserByCriteriaCommand $command): User
    {
        $name  = new UserName($command->name());
        $email = new UserEmail($command->email());

        $user = $this->getUserByCriteriaUseCase->__invoke($name, $email);

        return $user;
    }
}
