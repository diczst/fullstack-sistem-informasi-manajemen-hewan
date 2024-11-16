<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $admin_role = Role::findByName('admin', 'api');
        $owner_role = Role::findByName('owner', 'api');


        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        // Fetch the role with the specific guard
        $admin->assignRole($admin_role);

        $owner = User::create([
            'name' => 'owner1',
            'email' => 'usertwo@example.com',
            'password' => Hash::make('12345678'),
        ]);
        $owner->assignRole($owner_role);

        // admin + owner role
        $adminowner = User::create([
            'name' => 'admin+owner',
            'email' => 'adminowner@mail.com',
            'password' => Hash::make('12345678'),
        ]);
        $adminowner->assignRole($admin_role);
        $adminowner->assignRole($owner_role);

        User::create([
            'name' => 'guest',
            'email' => 'guest@example.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
