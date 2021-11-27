<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Illuminate\Support\Carbon;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $isComplete = (random_int(1,10) == 5) ? true : false;
        $isDeleted = (random_int(1, 15) == 5) ? true : false;

        return [
            'name' => $this->faker->realText(30),
            'is_complete' => $isComplete,
            'deleted_at' => ($isDeleted) ? Carbon::now()->subDays(random_int(1, 15))->toDateTimeString() : null
        ];
    }
}
