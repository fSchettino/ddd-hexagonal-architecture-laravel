<?php

namespace App\BrandPanel\Modules\Store\Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Tests\TestCase;

class GetUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_created_user_is_retrieved()
    {
        $this->withoutExceptionHandling();

        factory(User::class)->create(['email_verified_at' => null]);

        $this->assertCount(1, User::all());

        $user = User::first();

        $this->json('GET', "/api/user/$user->id")
            ->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => $user->name,
                    'email' => $user->email,
                    'emailVerifiedDate' => $user->email_verified_at
                ]
            ]);
    }
}
