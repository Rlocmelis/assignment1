<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Ability;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Role;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::firstOrCreate([
            'name' => 'admin'
        ]);

        $userRole = Role::firstOrCreate([
            'name' => 'user'
        ]);

        $crud_table = Ability::firstOrCreate([
           'name' => 'crud_table'
        ]);

        $viewTable = Ability::firstOrCreate([
            'name' => 'view_table'
        ]);

        $adminRole->allowTo($crud_table);
        $adminRole->allowTo($viewTable);
        $userRole->allowTo($viewTable);

        $admin = \App\Models\User::create([
            'name' => env('INITIAL_ADMIN_NAME'),
           'email' => env('INITIAL_ADMIN_EMAIL'),
           'email_verified_at' => now(),
           'password' => Hash::make(env('INITIAL_ADMIN_PASSWORD')),
           'remember_token' => Str::random(10)
        ]);

        $user = \App\Models\User::create([
            'name' => env('INITIAL_USER_NAME'),
            'email' => env('INITIAL_USER_EMAIL'),
            'email_verified_at' => now(),
            'password' => Hash::make(env('INITIAL_USER_PASSWORD')),
            'remember_token' => Str::random(10)
        ]);

        $admin->assignRole($adminRole);
        $user->assignRole($userRole);

        Product::factory()->count(10)->create();

    }
}
