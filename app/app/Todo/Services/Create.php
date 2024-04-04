<?php

namespace App\Todo\Services;

use App\Models\Todo;
use App\Todo\Manager\TodoManagerInterface;

class Create
{
    public function __construct(protected TodoManagerInterface $todoManager)
    {
        //
    }

    public function create(array $data): void
    {
        $this->todoManager->create($data);
    }

    public function getTodo(): Todo
    {
        return $this->todoManager->getTodo();
    }
}
