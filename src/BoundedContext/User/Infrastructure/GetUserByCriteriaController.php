<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaCommand;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaCommandHandler;
use Src\BoundedContext\User\Application\Get\GetUserByCriteriaUseCase;
use Src\BoundedContext\User\Infrastructure\Repositories\EloquentUserRepository;

final class GetUserByCriteriaController
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

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        $getUserByCriteriaCommand = new GetUserByCriteriaCommand($userName, $userEmail);
        $getUserByCriteriaCommandHandler = new GetUserByCriteriaCommandHandler($getUserByCriteriaUseCase);
        $user = $getUserByCriteriaCommandHandler->__invoke($getUserByCriteriaCommand);

        return $user;
    }
}
