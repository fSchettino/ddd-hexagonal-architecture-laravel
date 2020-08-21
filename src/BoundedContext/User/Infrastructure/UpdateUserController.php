<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\Get\GetUserCommand;
use Src\BoundedContext\User\Application\Get\GetUserCommandHandler;
use Src\BoundedContext\User\Application\Get\GetUserUseCase;
use Src\BoundedContext\User\Application\Update\UpdateUserCommand;
use Src\BoundedContext\User\Application\Update\UpdateUserCommandHandler;
use Src\BoundedContext\User\Application\Update\UpdateUserUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\BoundedContext\User\Infrastructure\Resources\UserResource;

final class UpdateUserController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;

        $getUserUseCase = new GetUserUseCase($this->repository);
        $getUserCommand = new GetUserCommand($userId);
        $getUserCommandHandler = new GetUserCommandHandler($getUserUseCase);
        $user = $getUserCommandHandler->__invoke($getUserCommand);

        $userName = $request->input('name') ?? $user->name()->value();
        $userEmail = $request->input('email') ?? $user->email()->value();
        $userEmailVerifiedDate = $user->emailVerifiedDate()->value();
        $userPassword = $user->password()->value();
        $userRememberToken = $user->rememberToken()->value();

        $updateUserUseCase = new UpdateUserUseCase($this->repository);
        $updateUserCommand = new UpdateUserCommand(
            $userId,
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken);
        $updateUserCommandHandler = new UpdateUserCommandHandler($updateUserUseCase);
        $updateUserCommandHandler->__invoke($updateUserCommand);

        $updatedUser = $getUserCommandHandler->__invoke($getUserCommand);

        return new UserResource($updatedUser);
    }
}
