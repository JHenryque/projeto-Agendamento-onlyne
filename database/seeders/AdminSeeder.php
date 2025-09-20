<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'department_id' => 1,   // Administração
            'name' => 'José Henrique',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Aa123456'),
            'role' => 'admin',
            'permissions' => '["admin"]',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // --------- area endereço admin

        DB::table('user_adresses')->insert([
            'user_id' => 1,
            'phone'=> '123456789',
            'address' => 'Rua do Administrador',
            'number' => "133",
            'bairro' => 'Cohab 2',
            'cidade' => 'Garanhuns',
            'cep'=> '552125',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // ------------ area de departaments

        DB::table('departments')->insert([
            'name' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'name' => 'colaborador',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('departments')->insert([
            'name' => 'empreendedor',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
