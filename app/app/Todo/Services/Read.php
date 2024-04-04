<?php

namespace App\Todo\Services;

use App\Models\Todo;
use Illuminate\Support\Collection;

class Read
{
    /**
     * @var Collection<Todo>
     */
    protected Collection $todos;
    private const ORDER_DIR = [
        "up"   => "asc",
        "down" => "desc"
    ];

    public function read(array $data): void
    {
        $query = Todo::query();

        if (isset($data["text"]) && strlen($data["text"]) > 0) {
            $query->where("title", "like", sprintf("%%%s%%", $data["text"]));
        }

        if (isset($data["status"])) {
            $query->where("status", $data["status"]);
        }

        if (isset($data["order_by"])) {
            $query->orderBy($data["order_by"], self::ORDER_DIR[$data["order_dir"]]);
        }

        $this->todos = $query->get();
    }

    /**
     * @return Collection<Todo>
     */
    public function getTodos(): Collection
    {
        return $this->todos;
    }
}
