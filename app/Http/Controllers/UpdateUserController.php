<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\UpdateUserController
     */
    private $updateUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\UpdateUserController $updateUserController)
    {
        $this->updateUserController = $updateUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $updatedUser = new UserResource($this->updateUserController->__invoke($request));

        return response($updatedUser, 200);
    }
}
