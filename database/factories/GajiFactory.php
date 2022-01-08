<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GajiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name_karyawan' => $this->faker->name(10),
            'gaji_karyawan' => $this->faker->number(10),
            'tanggal' => $this->faker->date(10),
        ];
    }
}
