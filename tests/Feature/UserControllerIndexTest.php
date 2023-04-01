<?php

namespace Tests\Feature;

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserControllerIndexTest extends TestCase
{
    // este comando aplica datos temporales en el test


    /**
     * A basic feature test example.
     */
    public function test_Admin_can_access_AdminHome()
    {

        // usuario con permiso de admin 

        // $user = User::find(51);


        // Permission::create(['name' => 'admin.users.edit'])->assignRole($role1);
        $user = User::factory()->create();
        // dump($user->hasRole('Admin') == true);
        $response = $this->actingAs($user)->get('/home');
        $response->assertStatus(200);

        // $response->assertSee('users');
    }
}
