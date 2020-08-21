<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetUserController extends Controller
{
    /**
     * @var \Src\BoundedContext\User\Infrastructure\GetUserController
     */
    private $getUserController;

    public function __construct(\Src\BoundedContext\User\Infrastructure\GetUserController $getUserController)
    {
        $this->getUserController = $getUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response($this->getUserController->__invoke($request), 200);
    }
}
