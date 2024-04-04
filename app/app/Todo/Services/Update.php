<?php

namespace App\Todo\Services;

use App\Models\Todo;
use App\Todo\Manager\TodoManagerInterface;

class Update
{
    public function __construct(protected TodoManagerInterface $todoManager)
    {
        //
    }

    public function update(array $data): void
    {
        $this->todoManager->update($data);
    }

    public function getTodo(): Todo|null
    {
        return $this->todoManager->getTodo();
    }
}
