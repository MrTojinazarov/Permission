<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;

class DatabaseSeeder extends Seeder
{
    
    public function run(): void
    {
        $name = 'Admin';
        $email = 'admin@gmail.com';
        $password = Hash::make('admin');
    
        $admin = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        $role = Role::create(['name' => 'admin']);
    
        $admin->roles()->attach($role);

        $routes = Route::getRoutes();

        foreach($routes as $route){

            $key = $route->getName();

            if($key && !str_starts_with($key, 'generated::') && $key !== 'storage.local'){

                $name = ucfirst(str_replace('.', '-', $key));

                Permission::create([
                    'key' => $key,
                    'name' => $name,
                ]);
            }
        }
        $permissions = Permission::pluck('id')->toArray();
        $role->permissions()->attach($permissions); 

    }
}
