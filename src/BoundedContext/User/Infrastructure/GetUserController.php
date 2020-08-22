<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\Get\GetUserCommand;
use Src\BoundedContext\User\Application\Get\GetUserCommandHandler;
use Src\BoundedContext\User\Application\Get\GetUserUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class GetUserController
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

        return $user;
    }
}
