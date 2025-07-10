<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Carbon\Carbon;

class FamilyCardSeeder extends Seeder
{
    public function run(): void
    {
        DB::disableQueryLog(); // Boost: nonaktifkan query log
        DB::statement('SET FOREIGN_KEY_CHECKS=0;'); // Optional: untuk hindari error FK

        $csv = Reader::createFromPath(database_path('seeders/csv/kartu_keluarga.csv'), 'r');
        $csv->setHeaderOffset(0); // baris pertama sebagai header

        $batchSize = 2000;
        $batch = [];

        foreach ($csv as $row) {
            $batch[] = [
                'card_number' => strtolower($row['no_kk']),
                'head_of_family_name' => strtolower($row['nama_kepala_keluarga']),
                'street_address' => strtolower($row['alamat_jalan']),
                'rt' => strtolower($row['rt']),
                'rw' => strtolower($row['rw']),
                'postal_code' => strtolower($row['kode_pos']),
                'phone_number' => strtolower($row['telp']),
                'created_at' => now(),
                'updated_at' => now(),
            ];

            if (count($batch) === $batchSize) {
                DB::table('family_cards')->insert($batch);
                $batch = [];
            }
        }

        if (!empty($batch)) {
            DB::table('family_cards')->insert($batch);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); // Aktifkan kembali FK
        DB::enableQueryLog(); // Aktifkan kembali query logging
    }
}
