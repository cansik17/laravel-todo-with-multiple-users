<?php

namespace Database\Seeders;

use App\Models\Task;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::truncate();
        Task::factory()
            ->times(150)
            ->create();
    }
}
