<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'note' => $this->faker->text($maxNbChars = 200),
            'user_id' => $this->faker->numberBetween($min = 1, $max = 5),
            'updated_at' => $this->faker->dateTime($max = 'now', $timezone = null),

        ];
    }
}
