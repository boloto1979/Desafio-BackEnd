<?php

use App\Models\Redirect;
use Illuminate\Database\Eloquent\Factories\Factory;

class RedirectFactory extends Factory
{
    protected $model = Redirect::class;

    public function definition()
    {
        return [
            'url' => $this->faker->url,
            'active' => $this->faker->boolean,
        ];
    }
}
