<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

abstract class Controller
{
    protected function jsonResponse(int $code, string $message, array $data = []): Response
    {
        return (new Response())
            ->setContent([
                "message" => $message,
                "data" => $data
            ])
            ->setStatusCode($code)
            ->header("Content-Type", "application/json");
    }

    protected function notFound(): Response
    {
        return $this->jsonResponse(\Symfony\Component\HttpFoundation\Response::HTTP_NOT_FOUND, "not found");
    }
}
