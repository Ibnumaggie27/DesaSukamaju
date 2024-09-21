<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Buat user admin
        User::create([
            'nama' => 'Admin User',
            'username' => 'admin@example.com',
            'password' => bcrypt('admin123'), // Password yang telah di-hash
            'level' => 'admin', // Anda asumsikan memiliki kolom 'level' di tabel users
        ]);

        // Buat user petugas
        User::create([
            'nama' => 'Petugas User',
            'username' => 'petugas@example.com',
            'password' => bcrypt('petugas123'),
            'level' => 'petugas',
        ]);
        User::create([
            'nama' => 'kasi kesra',
            'username' => 'kesra@example.com',
            'password' => bcrypt('kesra123'),
            'level' => 'kesra',
        ]);
        User::create([
            'nama' => 'kasi pelayanan',
            'username' => 'pelayanan@example.com',
            'password' => bcrypt('pelayanan123'),
            'level' => 'pelayanan',
        ]);
        User::create([
            'nama' => 'kasi pemerintahan',
            'username' => 'pemerintahan@example.com',
            'password' => bcrypt('pemerintahan123'),
            'level' => 'pemerintahan',
        ]);

        // Tambahkan user lainnya sesuai kebutuhan
    }
}
