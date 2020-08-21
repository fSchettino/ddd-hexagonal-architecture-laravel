<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\CreateUserController
     */
    private $createUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\CreateUserController $createUserController)
    {
        $this->createUserController = $createUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response($this->createUserController->__invoke($request), 201);
    }
}
