<?php

declare(strict_types = 1);

namespace Src\BoundedContext\User\Application\Get;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class GetUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserId $id): ?User
    {
        $user = $this->repository->find($id);

        return $user;
    }
}
