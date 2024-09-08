<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            
            [
                'email' => 'admin@example.com',
                'legajo' => null,
                'password' => Hash::make('password'),
                'role' => 'admin',
            ],

            [

                'email' => 'admin@gmail.com',
                'legajo' => null,
                'password' => Hash::make('12345'),
                'role' => 'admin',
            ],
            

            // Agregar el resto de los usuarios

            [
                'legajo' => 'CA123',
                'email' => 'comision@example.com',
                'password' => Hash::make('password'),
                'role' => 'comision',
            ],

            [
                'legajo' => 'SA123',
                'email' => 'secretaria@example.com',
                'password' => Hash::make('password'),
                'role' => 'secretaria',
            ],

            [
                'legajo' => 'P123',
                'email' => 'profesor@example.com',
                'password' => Hash::make('password'),
                'role' => 'profesor',
            ],

            [
                'legajo' => 'A123',
                'email' => 'administracion@example.com',
                'password' => Hash::make('password'),
                'role' => 'administracion',
            ],

            [
                'legajo' => '9',
                'email' => 'daniel.pelaez@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
            ],

            [
                'legajo' => '5160',
                'email' => 'maria.garcia@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
            ],

            [
                'legajo' => '5161',
                'email' => 'juan.perez@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
            ],


            
        ];

        DB::table('users')->insert($data);
    }
}
