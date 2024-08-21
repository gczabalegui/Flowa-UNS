<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            // Agregar el resto de los usuarios

            [
                'name' => 'Comision Academica',
                'legajo' => 'CA123',
                'email' => 'comision@example.com',
                'password' => Hash::make('password'),
                'role' => 'comision',
            ],

            [
                'name' => 'Secretaria Academica',
                'legajo' => 'SA123',
                'email' => 'secretaria@example.com',
                'password' => Hash::make('password'),
                'role' => 'secretaria',
            ],

            [
                'name' => 'Profesor',
                'legajo' => 'P123',
                'email' => 'profesor@example.com',
                'password' => Hash::make('password'),
                'role' => 'profesor',
            ],

            [
                'name' => 'Administracion',
                'legajo' => 'A123',
                'email' => 'administracion@example.com',
                'password' => Hash::make('password'),
                'role' => 'administracion',
            ],
        ];

        foreach ($data as $user) {
            User::create($user);
        }
    }
}
