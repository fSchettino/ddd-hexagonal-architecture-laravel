<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Get;

use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\Shared\Domain\CommandHandler;

final class GetUserCommandHandler implements CommandHandler
{
    private $getUserUseCase;

    public function __construct(GetUserUseCase $getUserUseCase)
    {
        $this->getUserUseCase = $getUserUseCase;
    }

    public function __invoke(GetUserCommand $command): User
    {
        $id = new UserId($command->id());

        $user = $this->getUserUseCase->__invoke($id);

        return $user;
    }
}
