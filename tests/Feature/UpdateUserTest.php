<?php

namespace App\BrandPanel\Modules\Store\Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UpdateUserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_is_updated()
    {
        $user = factory(User::class)->create(['email_verified_at' => null]);

        $this->putJson("/api/user/$user->id", [
            'data' => [
                'name' => 'Name Surname',
                'email' => 'name.surname@email.com'
            ]
        ])->assertStatus(200);

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
