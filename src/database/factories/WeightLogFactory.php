<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\WeightLog;


class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected $model = WeightLog::class;

    public function definition()
    {
        return [
            //
            'user_id' => 1, // 適当なユーザーID（Seederでユーザー1件作っている前提）
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 100),
            'calories' => $this->faker->numberBetween(1000, 3000),
            'exercise_time' => $this->faker->numberBetween(0, 180), // 分単位
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
