<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin Perpustakaan',
            'email' => 'admin@perpus.sch.id',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'student_id' => null,
            'phone' => '08123456789',
            'address' => 'Perpustakaan Sekolah'
        ]);
        
        User::create([
            'name' => 'Siswa Contoh',
            'email' => 'siswa@perpus.sch.id',
            'password' => Hash::make('password'),
            'role' => 'user',
            'student_id' => 'S001',
            'phone' => '08123456788',
            'address' => 'Kelas X-A'
        ]);
    }
}
