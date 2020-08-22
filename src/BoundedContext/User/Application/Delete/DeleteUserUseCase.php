<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application\Delete;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\ValueObjects\UserId;

final class DeleteUserUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserId $id): void
    {
        $this->repository->delete($id);
    }
}
