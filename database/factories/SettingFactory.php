<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "name" => $this->faker->name(),
            "about_us" => $this->faker->paragraph(2),
            "why_us" => $this->faker->paragraph(2),
            "goal" => $this->faker->paragraph(2),
            "vision" => $this->faker->paragraph(2),
            "about_footer" => $this->faker->paragraph(2),
            "ads_text" => $this->faker->paragraph(2),
        ];
    }
}
