<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['role_name' => 'Administrator']);
        Role::create(['role_name' => 'Staff']);
        Role::create(['role_name' => 'Student']);
    }
}
