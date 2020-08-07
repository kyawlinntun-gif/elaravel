<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $user = User::create(['name' => 'Tun Tun', 'email' => 'tuntun@gmail.com', 'password' => bcrypt('123456')]);

        $role = Role::create(['name' => 'admin']);

        $premission = Permission::create(['name' => 'manager']);

        $role->givePermissionTo($premission);
        $user->assignRole($role);

    }
}
