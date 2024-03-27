<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kamar>
 */
class KamarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'no_kamar' => fake()->mt_rand(1,3),
            'tipe_kamar' => mt_rand(1,3),
            'status' => fake()->boolean(),
            'tgl_masuk' => fake()->date('Y-m-d'),
            'tgl_keluar' => fake()->date('Y-m-d'),
        ];
    }
}
