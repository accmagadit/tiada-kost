<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PenghuniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama_penghuni' => fake()->name(),
            'no_telp' => fake()->numberBetween(),
            'kamar' => mt_rand(1,3),
            'tgl_masuk' => fake()->date('Y-m-d'),
            'tgl_keluar' => fake()->date('Y-m-d'),
        ];
    }
}
