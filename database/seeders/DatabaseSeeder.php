<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use App\Models\Student;
use App\Models\Grade;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Grade::factory(4)->create();
        User::factory(10)->create();
        Student::factory(100)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Kelas PPLG
        Grade::factory()->create(['name' => '10 PPLG 1', 'department_id' => 1]);
        Grade::factory()->create(['name' => '10 PPLG 2', 'department_id' => 1]);
        Grade::factory()->create(['name' => '11 PPLG 1', 'department_id' => 1]);
        Grade::factory()->create(['name' => '11 PPLG 2', 'department_id' => 1]);
        Grade::factory()->create(['name' => '12 PPLG 1', 'department_id' => 1]);
        Grade::factory()->create(['name' => '12 PPLG 2', 'department_id' => 1]);

        // Kelas Animasi 3D (3 kelas setiap angkatan)
        Grade::factory()->create(['name' => '10 Animasi 3D 1', 'department_id' => 2]);
        Grade::factory()->create(['name' => '10 Animasi 3D 2', 'department_id' => 2]);
        Grade::factory()->create(['name' => '10 Animasi 3D 3', 'department_id' => 2]);
        Grade::factory()->create(['name' => '11 Animasi 3D 1', 'department_id' => 2]);
        Grade::factory()->create(['name' => '11 Animasi 3D 2', 'department_id' => 2]);
        Grade::factory()->create(['name' => '11 Animasi 3D 3', 'department_id' => 2]);
        Grade::factory()->create(['name' => '12 Animasi 3D 1', 'department_id' => 2]);
        Grade::factory()->create(['name' => '12 Animasi 3D 2', 'department_id' => 2]);
        Grade::factory()->create(['name' => '12 Animasi 3D 3', 'department_id' => 2]);

        // Kelas Animasi 2D (hanya kelas 4 dan 5 setiap angkatan)
        Grade::factory()->create(['name' => '10 Animasi 2D 4', 'department_id' => 3]);
        Grade::factory()->create(['name' => '10 Animasi 2D 5', 'department_id' => 3]);
        Grade::factory()->create(['name' => '11 Animasi 2D 4', 'department_id' => 3]);
        Grade::factory()->create(['name' => '11 Animasi 2D 5', 'department_id' => 3]);
        Grade::factory()->create(['name' => '12 Animasi 2D 4', 'department_id' => 3]);
        Grade::factory()->create(['name' => '12 Animasi 2D 5', 'department_id' => 3]);

        // Kelas DKV DG
        Grade::factory()->create(['name' => '10 DKV DG 1', 'department_id' => 4]);
        Grade::factory()->create(['name' => '10 DKV DG 2', 'department_id' => 4]);
        Grade::factory()->create(['name' => '11 DKV DG 1', 'department_id' => 4]);
        Grade::factory()->create(['name' => '11 DKV DG 2', 'department_id' => 4]);
        Grade::factory()->create(['name' => '12 DKV DG 1', 'department_id' => 4]);
        Grade::factory()->create(['name' => '12 DKV DG 2', 'department_id' => 4]);

        // Kelas DKV TG (dengan tambahan kelas 5)
        Grade::factory()->create(['name' => '10 DKV TG 3', 'department_id' => 5]);
        Grade::factory()->create(['name' => '10 DKV TG 4', 'department_id' => 5]);
        Grade::factory()->create(['name' => '10 DKV TG 5', 'department_id' => 5]);
        Grade::factory()->create(['name' => '11 DKV TG 3', 'department_id' => 5]);
        Grade::factory()->create(['name' => '11 DKV TG 4', 'department_id' => 5]);
        Grade::factory()->create(['name' => '11 DKV TG 5', 'department_id' => 5]);
        Grade::factory()->create(['name' => '12 DKV TG 3', 'department_id' => 5]);
        Grade::factory()->create(['name' => '12 DKV TG 4', 'department_id' => 5]);
        Grade::factory()->create(['name' => '12 DKV TG 5', 'department_id' => 5]);


        Department::factory()->create(['name' => 'PPLG', 'desc' => 'Jurusan yang membuat aplikasi,web,game,dekstop,iot']);
        Department::factory()->create(['name' => 'Animasi 3D', 'desc' => 'Jurusan Animasi yang membuat film 3D']);
        Department::factory()->create(['name' => 'Animasi 2D', 'desc' => 'Jurusan Animasi yang membuat film 2D']);
        Department::factory()->create(['name' => 'DG', 'desc' => 'Jurusan yang membuat desain grafis dan produk']);
        Department::factory()->create(['name' => 'TG', 'desc' => 'Jurusan yang melakukan teknik percetakan']);
    }
}
