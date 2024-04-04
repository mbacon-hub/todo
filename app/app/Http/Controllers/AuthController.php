<?php

namespace App\Http\Controllers;

use App\Auth\Services\LoginToken;
use App\Http\Requests\LoginRequest;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return Response
     * @throws AuthenticationException
     * @throws BindingResolutionException
     */
    public function login(LoginRequest $request): Response
    {
        $data = $request->validated();

        /** @var LoginToken $service */
        $service = app()->make(LoginToken::class);

        $service->login($data);

        return $this->jsonResponse(\Symfony\Component\HttpFoundation\Response::HTTP_OK, "success", [
            "token" => $service->getToken()
        ]);
    }
}
