<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@gmail.com',
            'password' => Hash::make('admin1password'),
            'email_verified_at' => now(),
            'role' => 'admin',
        ]);

        User::create([
        'name' => 'Dokter 1',
        'email' => 'dokter1@gmail.com',
        'password' => Hash::make('dokter1password'),
        'email_verified_at' => now(),
        'role' => 'dokter',
        ]);

        User::create([
            'name' => 'Mahasiswa 1',
            'email' => 'mahasiswa1@gmail.com',
            'password' => Hash::make('mahasiswa1password'),
            'email_verified_at' => now(),
            'role' => 'mahasiswa',
        ]);

    }
}
