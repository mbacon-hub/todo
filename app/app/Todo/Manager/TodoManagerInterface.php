<?php
namespace App\Todo\Manager;

interface TodoManagerInterface
{
    public function create(array $data): void;
    public function update(array $data): void;
    public function delete(): void;
    public function getTodo(): \App\Models\Todo|null;
}
