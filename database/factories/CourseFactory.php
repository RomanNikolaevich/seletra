<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    protected $model = Course::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'link' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->numberBetween(1, 6),
            'type' => $this->faker->numberBetween(1, 16),
            'favorites' => $this->faker->boolean,
            'category' => $this->faker->numberBetween(1, 30),
        ];
    }
}
