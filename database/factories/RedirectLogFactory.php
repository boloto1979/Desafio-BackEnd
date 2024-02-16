<?php

use App\Models\RedirectLog;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Redirect;

class RedirectLogFactory extends Factory
{
    protected $model = RedirectLog::class;

    public function definition()
    {
        return [
            'redirect_id' => function () {
                return Redirect::factory()->create()->id;
            },
            'ip' => $this->faker->ipv4,
            'user_agent' => $this->faker->userAgent,
            'referer' => $this->faker->url,
            'query_params' => json_encode($this->faker->words),
            // 'created_at' e 'updated_at'
        ];
    }
}
