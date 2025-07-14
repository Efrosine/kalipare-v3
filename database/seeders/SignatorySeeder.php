<?php

namespace Database\Seeders;

use App\Models\Signatory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SignatorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Signatory::create([
            'signatory_name' => 'Saiful Anwar',
            'signatory_position' => 'Kepala Desa',
        ]);
        Signatory::create([
            'signatory_name' => 'Ahmad Yusro',
            'signatory_position' => 'Serkretaris Desa',
        ]);
        Signatory::create([
            'signatory_name' => 'Septian Hendri Purwanto',
            'signatory_position' => 'KASI Pemerintahan',
        ]);
        Signatory::create([
            'signatory_name' => 'Asmari',
            'signatory_position' => 'KASI Pelayanan',
        ]);
    }
}
