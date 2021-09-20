<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create([
        	'title' => 'doctor',
        	'description' => 'Doctor Profile'
        ]);
 
        $role = Role::create([
        	'title' => 'staff',
        	'description' => 'Staff Profile'
        ]);

        $role = Role::create([
        	'title' => 'admin',
        	'description' => 'Admin Profile'
        ]);

        $user = User::create([
            'role_id' => $role->id,
            'name' => 'Admin',
        	'number'=> '1010101010',
            'email'=> 'admin@gmail.com',
        	'password' => bcrypt('admin'),
        ]);
    }
}
