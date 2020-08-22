<?php

declare(strict_types=1);

namespace Src\BoundedContext\User\Infrastructure;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Src\BoundedContext\User\Application\CreateUserUseCase;
use Src\BoundedContext\User\Application\GetUserByCriteriaUseCase;
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
        $userName              = $request->input('name');
        $userEmail             = $request->input('email');
        $userEmailVerifiedDate = null;
        $userPassword          = Hash::make($request->input('password'));
        $userRememberToken     = null;

        $createUserUseCase = new CreateUserUseCase($this->repository);
        $createUserUseCase->__invoke(
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->repository);
        $newUser                  = $getUserByCriteriaUseCase->__invoke($userName, $userEmail);

        return $newUser;
    }
}
