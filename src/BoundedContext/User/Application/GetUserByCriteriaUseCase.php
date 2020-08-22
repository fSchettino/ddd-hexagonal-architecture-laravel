<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Application;

use Src\BoundedContext\User\Domain\Contracts\UserRepositoryContract;
use Src\BoundedContext\User\Domain\User;
use Src\BoundedContext\User\Domain\ValueObjects\UserEmail;
use Src\BoundedContext\User\Domain\ValueObjects\UserName;

final class GetUserByCriteriaUseCase
{
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(string $userName, string $userEmail): ?User
    {
        $name  = new UserName($userName);
        $email = new UserEmail($userEmail);

        $user = $this->repository->findByCriteria($name, $email);

        return $user;
    }
}
