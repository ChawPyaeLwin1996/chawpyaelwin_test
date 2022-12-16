<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BillingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' =>$this->faker->phone,
            'address' =>$this->faker->address,
            'photo' =>$this->$faker->image('storage/app/public/images',640,480, null, false)
        ];
    }
}
