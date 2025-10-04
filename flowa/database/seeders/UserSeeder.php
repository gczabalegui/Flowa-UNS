<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        $data = [
            // Admin global
            [
                'email' => 'florloustaunau@gmail.com',
                'legajo' => null,
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'email' => 'guadus.c@gmail.com',
                'legajo' => null,
                'password' => Hash::make('guadalu'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            [
                'email' => 'flowauns25@gmail.com',
                'legajo' => null,
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Otros admins de prueba
            [
                'email' => 'admin@example.com',
                'legajo' => null,
                'password' => Hash::make('password'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'email' => 'admin@gmail.com',
                'legajo' => null,
                'password' => Hash::make('12345'),
                'role' => 'admin',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Usuarios de prueba
            [
                'legajo' => 'CA123',
                'email' => 'comision@example.com',
                'password' => Hash::make('password'),
                'role' => 'comision',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'legajo' => 'SA123',
                'email' => 'secretaria@example.com',
                'password' => Hash::make('password'),
                'role' => 'secretaria',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'legajo' => 'P123',
                'email' => 'profesor@example.com',
                'password' => Hash::make('password'),
                'role' => 'profesor',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'legajo' => 'A123',
                'email' => 'administracion@example.com',
                'password' => Hash::make('password'),
                'role' => 'administracion',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],

            // Profesores reales de prueba
            [
                'legajo' => '9',
                'email' => 'daniel.pelaez@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'legajo' => '5160',
                'email' => 'maria.garcia@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'legajo' => '5161',
                'email' => 'juan.perez@uns.edu.ar',
                'password' => Hash::make('12345'),
                'role' => 'profesor',
                'remember_token' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('users')->insert($data);
    }
}
