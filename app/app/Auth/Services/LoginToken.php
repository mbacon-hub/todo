<?php

namespace App\Auth\Services;

use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class LoginToken
{
    protected string $token;

    public function login(array $data): void
    {
        if (!Auth::attempt($data)) {
            throw new AuthenticationException();
        }

        $this->token = Auth::user()->createToken("all")->plainTextToken;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
