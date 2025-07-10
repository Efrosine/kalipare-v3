<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Carbon\Carbon;

class FamilyMemberSeeder extends Seeder
{
    public function run(): void
    {
        DB::disableQueryLog(); // Boost: Matikan query logging
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Boost: Skip FK check jika perlu

        $csv = Reader::createFromPath(database_path('seeders/csv/anggota_keluarga.csv'), 'r');
        $csv->setHeaderOffset(0);

        $batchSize = 2000;
        $batch = [];

        foreach ($csv as $row) {
            $tanggal_lahir = trim($row['tanggal_lahir'] ?? '');
            $tanggal_fix = null;

            if ($tanggal_lahir) {
                try {
                    $tanggal_fix = Carbon::createFromFormat('d/m/Y', $tanggal_lahir)->format('Y-m-d');
                } catch (\Exception $e1) {
                    try {
                        $tanggal_fix = Carbon::createFromFormat('d-m-Y', $tanggal_lahir)->format('Y-m-d');
                    } catch (\Exception $e2) {
                        $tanggal_fix = null; // Dibiarkan null jika gagal parsing
                    }
                }
            }

            $batch[] = [
                'family_card_number' => strtolower($row['no_kk']),
                'national_id_number' => strtolower($row['nik']),
                'name' => strtolower($row['nama']),
                'gender' => strtolower($row['jenis_kelamin']),
                'place_of_birth' => strtolower($row['tempat_lahir']),
                'date_of_birth' => $tanggal_fix,
                'blood_type' => strtolower($row['golongan_darah']),
                'religion' => strtolower($row['agama']),
                'marital_status' => strtolower($row['status_perkawinan']),
                'family_relationship_status' => strtolower($row['status_hubungan_dalam_keluarga']),
                'education' => strtolower($row['pendidikan']),
                'occupation' => strtolower($row['pekerjaan']),
                'mothers_name' => strtolower($row['nama_ibu']),
                'fathers_name' => strtolower($row['nama_ayah']),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            // Insert setiap batch 1000 row
            if (count($batch) === $batchSize) {
                DB::table('family_members')->insert($batch);
                $batch = [];
            }
        }

        // Insert sisa data terakhir
        if (!empty($batch)) {
            DB::table('family_members')->insert($batch);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Kembalikan FK check
        DB::enableQueryLog(); // Aktifkan kembali query logging
    }
}
