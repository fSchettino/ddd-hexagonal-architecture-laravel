<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\User\Application\Create\CreateUserCommand;
use Src\BoundedContext\User\Application\Create\CreateUserCommandHandler;
use Src\BoundedContext\User\Application\Create\CreateUserUseCase;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaCommand;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaCommandHandler;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class CreateUserController
{
    private $repository;

    public function __construct(EloquentUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(Request $request)
    {
        $userName = $request->input('name');
        $userEmail = $request->input('email');
        $userEmailVerifiedDate = null;
        $userPassword = Hash::make($request->input('password'));
        $userRememberToken = null;

        $createUserUseCase = new CreateUserUseCase($this->repository);
        $createUserCommand = new CreateUserCommand(
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );
        $createUserCommandHandler = new CreateUserCommandHandler($createUserUseCase);
        $createUserCommandHandler->__invoke($createUserCommand);

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        $getUserByCriteriaCommand = new GetUserByCriteriaCommand($userName, $userEmail);
        $getUserByCriteriaCommandHandler = new GetUserByCriteriaCommandHandler($getUserByCriteriaUseCase);
        $newUser = $getUserByCriteriaCommandHandler->__invoke($getUserByCriteriaCommand);

        return $newUser;
    }
}
