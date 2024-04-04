<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTodoRequest;
use App\Http\Requests\ReadTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Models\Todo;
use App\Todo\Services\Create;
use App\Todo\Services\Delete;
use App\Todo\Services\Read;
use App\Todo\Services\Update;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class TodoController extends Controller
{
    public function create(CreateTodoRequest $request): Response
    {
        $data = $request->validated();

        /** @var Create $service */
        $service = app()->make(Create::class);

        $service->create($data);

        return $this->jsonResponse(
            SymfonyResponse::HTTP_OK,
            "success",
            $service->getTodo()->toArray(),
        );
    }

    public function read(ReadTodoRequest $request): Response
    {
        $data = $request->validated();
        /** @var Read $service */
        $service = app()->make(Read::class);

        $service->read($data);

        return $this->jsonResponse(
            SymfonyResponse::HTTP_OK,
            "success",
            $service->getTodos()->toArray()
        );
    }

    public function update(UpdateTodoRequest $request, int $id): Response
    {
        $data = $request->validated();
        $todo = Todo::query()
            ->where("id", $id)
            ->first();

        if (is_null($todo)) {
            return $this->notFound();
        }

        /** @var Update $service */
        $service = app()->make(Update::class, [$todo]);

        $service->update($data);

        return $this->jsonResponse(
            SymfonyResponse::HTTP_OK,
            "success",
            $service->getTodo()->toArray(),
        );
    }

    public function delete(int $id): Response
    {
        $todo = Todo::query()
            ->where("id", $id)
            ->first();

        if (is_null($todo)) {
            return $this->notFound();
        }

        /** @var Delete $service */
        $service = app()->make(Delete::class, [$todo]);

        $service->delete();

        return $this->jsonResponse(
            SymfonyResponse::HTTP_OK,
            "success"
        );
    }
}
