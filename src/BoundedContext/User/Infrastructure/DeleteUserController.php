<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\Delete\DeleteUserCommand;
use Src\BoundedContext\User\Application\Delete\DeleteUserCommandHandler;
use Src\BoundedContext\User\Application\Delete\DeleteUserUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class DeleteUserController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;

        $deleteUserUseCase = new DeleteUserUseCase($this->repository);
        $deleteUserCommand = new DeleteUserCommand($userId);
        $deleteUserCommandHandler = new DeleteUserCommandHandler($deleteUserUseCase);
        $deleteUserCommandHandler->__invoke($deleteUserCommand);
    }
}
