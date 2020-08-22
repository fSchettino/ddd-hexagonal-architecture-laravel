<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Delete;

use Src\BoundedContext\User\Domain\ValueObjects\UserId;
use Src\Shared\Domain\CommandHandler;

final class DeleteUserCommandHandler implements CommandHandler
{
    private $deleteUserUseCase;

    public function __construct(DeleteUserUseCase $deleteUserUseCase)
    {
        $this->deleteUserUseCase = $deleteUserUseCase;
    }

    public function __invoke(DeleteUserCommand $command): void
    {
        $id = new UserId($command->id());

        $this->deleteUserUseCase->__invoke($id);
    }
}
