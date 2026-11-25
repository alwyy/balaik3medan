<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_has_fillable_role_and_is_active(): void
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@test.com',
            'password' => 'secret123',
            'role' => User::ROLE_ADMIN,
            'is_active' => true,
        ]);

        $this->assertEquals(User::ROLE_ADMIN, $user->role);
        $this->assertTrue($user->is_active);
        $this->assertTrue($user->isAdmin());
        $this->assertFalse($user->isEditor());
        $this->assertTrue($user->isActive());
    }

    public function test_editor_user_helper_methods(): void
    {
        $user = User::create([
            'name' => 'Editor User',
            'email' => 'editor@test.com',
            'password' => 'secret123',
            'role' => User::ROLE_EDITOR,
            'is_active' => false,
        ]);

        $this->assertEquals(User::ROLE_EDITOR, $user->role);
        $this->assertFalse($user->is_active);
        $this->assertFalse($user->isAdmin());
        $this->assertTrue($user->isEditor());
        $this->assertFalse($user->isActive());
    }

    public function test_user_factory_states(): void
    {
        $admin = User::factory()->admin()->create();
        $this->assertTrue($admin->isAdmin());

        $inactive = User::factory()->inactive()->create();
        $this->assertFalse($inactive->isActive());
    }

    public function test_user_scopes(): void
    {
        User::factory()->create(['role' => User::ROLE_EDITOR, 'is_active' => true]);
        User::factory()->admin()->create(['is_active' => true]);
        User::factory()->inactive()->create(['role' => User::ROLE_EDITOR]);

        $this->assertCount(2, User::active()->get());
        $this->assertCount(1, User::role(User::ROLE_ADMIN)->get());
        $this->assertCount(2, User::role(User::ROLE_EDITOR)->get());
    }
}
