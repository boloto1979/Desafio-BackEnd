<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Redirect;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Vinkla\Hashids\Facades\Hashids;

class RedirectTest extends TestCase
{
    use RefreshDatabase;

    public function testRedirectCreatesLogEntry()
    {
        $redirect = Redirect::factory()->create();

        $response = $this->get('/r/' . Hashids::encode($redirect->id));

        $response->assertRedirect($redirect->url);

        $this->assertDatabaseHas('redirect_logs', [
            'redirect_id' => $redirect->id,
        ]);
    }

}
