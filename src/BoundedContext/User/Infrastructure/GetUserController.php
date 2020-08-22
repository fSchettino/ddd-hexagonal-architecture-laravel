<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Src\BoundedContext\User\Application\GetUserUseCase;
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
        $user           = $getUserUseCase->__invoke($userId);

        return $user;
    }
}
