<?php

namespace App\Infrastructure\Controllers;

use App\Application\UserDataSource\UserDataSource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;

class GetUserController extends BaseController
{
    private UserDataSource $userDataSource;

    /**
     * @param UserDataSource $userDataSource
     */
    public function __construct(UserDataSource $userDataSource)
    {
        $this->userDataSource = $userDataSource;
    }
    public function __invoke(String $useremail): JsonResponse
    {
        //dd($useremail);//dd nos imprime por consola la variable
        $user= $this->userDataSource->findByEmail($useremail);
        if(is_null($user)){
            return response()->json([
                'error' => 'usuario no encontrado'
            ], Response::HTTP_NOT_FOUND);
        }
        return response()->json([
            'id' => '1',
            'email' => 'email@email.com',
        ], Response::HTTP_OK);
    }
}
