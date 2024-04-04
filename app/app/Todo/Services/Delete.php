<?php

namespace App\Todo\Services;

use App\Models\Todo;
use App\Todo\Manager\TodoManagerInterface;

class Delete
{
    public function __construct(protected TodoManagerInterface $todoManager)
    {
        //
    }

    public function delete(): void
    {
        $this->todoManager->delete();
    }
}
