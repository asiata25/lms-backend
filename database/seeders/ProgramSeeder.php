<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Program::create([
            'title' => "jago speaking",
            'description' => "Program belajar bahasa inggris untuk Kamu yang ingin menguasai speaking dari Dasar sampai LANCAR dengan praktik setiap hari."
        ]);

        Program::create([
            'title' => "english for worker",
            'description' => "Program belajar bahasa inggris untuk karyawan dengan materi all in one seputar karir dan dunia profesional, mulai penulisan email, proposal bisnis, sampai laporan bisnis dalam bahasa Inggris."
        ]);

        Program::create([
            'title' => "english for kids",
            'description' => "Program belajar bahasa Inggris khusus anak usia 6-14 tahun dengan metode belajar serasa bermain yang dirancang sesuai level usianya."
        ]);

        Program::create([
            'title' => "toefl preparation",
            'description' => "Program TOEFL Preparation bersertifikat untuk bantu Kamu raih target skor secara maksimal dari lembaga resmi."
        ]);

        Program::create([
            'title' => "ielts preparation",
            'description' => "Program IELTS Preparation bersertifikat untuk bantu Kamu raih target skor secara maksimal dari lembaga resmi."
        ]);
    }
}
