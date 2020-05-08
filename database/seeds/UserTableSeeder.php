<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Role::truncate();
        DB::table('assigned_roles')->truncate();
     
            $user = User::create([
                'name' => 'Sergio',
                'email' => 'sergio@hotmail.com',
                'password' => '123'
            ]);
        
         $role = Role::create([
             'name' => 'admin',
             'display_name' => 'Administrador',
             'description' => 'Administrador del sistema'
         ]);       
        
         $user->roles()->save($role);
    }
}
