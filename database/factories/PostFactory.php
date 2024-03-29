<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::first();
        if (!$user) {
            $user = User::factory()->create();
        }

        return [
            'title' => $this->faker->text($this->faker->numberBetween(5, 20)),
            'description' => $this->faker->text($this->faker->numberBetween(550, 650)),
            'contact_phone_number' => $this->faker->numerify('0##########'),
            'user_id' =>  User::pluck('id')->random()
        ];
    }
}
