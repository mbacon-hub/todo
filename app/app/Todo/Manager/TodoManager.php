<?php
namespace App\Todo\Manager;

class TodoManager implements TodoManagerInterface
{
    public const NOT_DONE = 1;

    protected \App\Models\Todo|null $todo;

    public function __construct(\App\Models\Todo|null $todo)
    {
        $this->todo = $todo;
    }

    public function create(array $data): void
    {
        $this->todo = new \App\Models\Todo();
        $this->todo->title = $data["title"];
        $this->todo->description = $data["description"];
        $this->todo->status = self::NOT_DONE;
        $this->todo->save();
    }

    public function update(array $data): void
    {
        $this->todo->title = $data["title"];
        $this->todo->description = $data["description"];
        $this->todo->status = $data["status"] ?? $this->todo->status;
        $this->todo->save();
    }

    public function delete(): void
    {
        $this->todo->delete();
    }

    public function getTodo(): \App\Models\Todo|null
    {
        return $this->todo;
    }
}
