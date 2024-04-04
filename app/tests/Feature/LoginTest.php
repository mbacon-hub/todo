<?php

namespace Tests\Feature;

use App\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class LoginTest extends TestCase
{
    private const LOGIN_URL = "api/auth/login";

    public function test_validation_fail()
    {
        $response = $this->postJson(self::LOGIN_URL);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
    }

    public function test_authentication_error(): void
    {
        $response = $this->postJson(self::LOGIN_URL, [
            "email" => "test@gmail.com",
            "password" => "12345"
        ]);

        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }

    public function test_success(): void
    {
        $this->seed();

        /** @var User $user */
        $user = \App\Models\User::query()
            ->inRandomOrder()
            ->first();

        $response = $this->postJson(self::LOGIN_URL, [
            "email" => $user->email,
            "password" => "12345678",
        ]);

        $response->assertStatus(Response::HTTP_OK);
    }
}
