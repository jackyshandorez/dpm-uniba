<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aspirasi>
 */
class AspirasiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('id_ID');
        return [
        'nama'           => $faker->name(),
        'nim'            => $faker->numerify('2103######'),
        'jurusan'        => $faker->randomElement(['Informatika', 'Hukum', 'Ekonomi']),
        'semester'       => $faker->numberBetween(1, 8),
        'judul_aspirasi' => $faker->sentence(5),
        'isi_aspirasi'   => $faker->paragraph(),
        'anonim'         => $faker->boolean(30),
    ];

    }
}
