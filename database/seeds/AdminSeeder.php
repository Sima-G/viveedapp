<?php

use App\User;

class AdminSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); // Using truncate function so all info will be cleared when re-seeding.
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $admin = Sentinel::registerAndActivate(array(
            'email'       => 'admin@admin.com',
            'password'    => 'admin',
            'first_name'  => 'John',
            'last_name'   => 'Doe',
        ));

        $adminRole = Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => array('admin' => 1),
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'Editor',
            'slug'  => 'editor',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'Author',
            'slug'  => 'author',
        ]);

        Sentinel::getRoleRepository()->createModel()->create([
            'name'  => 'User',
            'slug'  => 'user',
        ]);

        $admin->roles()->attach($adminRole);
    }
}