<?php

namespace Database\Seeders;

use App\Models\RefTodoStatus;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->createStatuses();

        if (app()->isLocal()) {
            User::factory([
                "email" => "user@gmail.com",
                "password" => "12345678",
            ])
                ->create();
        }

        if (app()->runningUnitTests()) {
            User::factory([
                "password" => "12345678"
            ])
                ->count(mt_rand(10, 25))
                ->create();
        }
    }

    private function createStatuses(): void
    {
        RefTodoStatus::create([
            "name" => "В задаче"
        ]);

        RefTodoStatus::create([
            "name" => "Выполнен"
        ]);
    }
}
