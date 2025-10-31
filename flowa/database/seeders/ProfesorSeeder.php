<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::where('email', 'maria.garcia@uns.edu.ar')->first();
        $user2 = User::where('email', 'daniel.pelaez@uns.edu.ar')->first();
        $user3 = User::where('email', 'juan.perez@uns.edu.ar')->first();

        $data = [
            [
                'nombre_profesor' => 'Daniel',
                'apellido_profesor' => 'Pelaez',
                'DNI_profesor' => '10976193',
                'email_profesor' => 'daniel.pelaez@uns.edu.ar',
                'legajo_profesor' => '9',
                'carrera_id' => 1,
                'user_id' => $user2->id,
                'contraseña_profesor' => Hash::make('12345'),
             ],
             [
                'nombre_profesor' => 'Maria',
                'apellido_profesor' => 'Garcia',
                'DNI_profesor' => '20976194',
                'email_profesor' => 'maria.garcia@uns.edu.ar',
                'legajo_profesor' => '5160',
                'carrera_id' => 1,
                'user_id' => $user1->id,
                'contraseña_profesor' => Hash::make('12345'),
             ],
             [
                'nombre_profesor' => 'Juan',
                'apellido_profesor' => 'Perez',
                'DNI_profesor' => '30976195',
                'email_profesor' => 'juan.perez@uns.edu.ar',
                'legajo_profesor' => '5161',
                'carrera_id' => 1,
                'user_id' => $user3->id,
                'contraseña_profesor' => Hash::make('12345'),
             ],
        ];

        DB::table('profesors')->insert($data);
    }
}
