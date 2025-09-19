<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Donation;
use App\Models\Supporter;

class DonationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Donation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'uuid' => fake()->uuid(),
            'type' => fake()->randomElement(["singular","perminute"]),
            'amount' => fake()->numberBetween(-10000, 10000),
            'supporter_id' => Supporter::factory(),
        ];
    }
}
