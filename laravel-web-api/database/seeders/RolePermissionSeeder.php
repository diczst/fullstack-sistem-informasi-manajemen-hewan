<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{

    /*
        permission :
        * patients
            - add-patient
            - edit-patient
            - delete-patient
            - get-patient

        role :
        * admin : add-parient, edit-patient, delete-patient, get-patient
        * owner : get-patient
    */

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat permission dengan guard_name 'api'
        Permission::create(['name' => 'add-patient', 'guard_name' => 'api']);
        Permission::create(['name' => 'edit-patient', 'guard_name' => 'api']);
        Permission::create(['name' => 'delete-patient', 'guard_name' => 'api']);
        Permission::create(['name' => 'get-patient', 'guard_name' => 'api']);

        // Membuat role dengan guard_name 'api'
        Role::create(['name' => 'admin', 'guard_name' => 'api']);
        Role::create(['name' => 'owner', 'guard_name' => 'api']);

        // Mencari role dengan guard_name yang sesuai
        $admin = Role::findByName('admin', 'api');
        $admin->givePermissionTo(['add-patient', 'edit-patient', 'delete-patient', 'get-patient']);

        $owner = Role::findByName('owner', 'api');
        $owner->givePermissionTo(['get-patient']);
    }
}
