<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Verifica si no hay usuarios en la tabla
        if (User::count() == 0) {
            // Crea un usuario administrador
            User::create([
                'name' => 'Admin',
                'email' => 'admin@triage.com',
                'password' => Hash::make('Qwerty123'), // Asegúrate de cambiar esta contraseña en producción
                'rol' => 'admin', // Asigna el rol de administrador
                'hospital' => 0, // Asigna el valor 0 al campo 'hospital'
            ]);
        }
    }
}
