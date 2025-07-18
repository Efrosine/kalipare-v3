<?php

namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prepare documents data array
        $documents = [
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 1, // Business Domicile
                'purpose' => 'Pengajuan Surat Keterangan (contoh)',
                'signature_date' => '1945-08-17',
                'signatory_id' => 1,
                'additional_data' => json_encode([
                    'business_name' => 'nama usaha',
                    'business_type' => 'jenis usaha',
                    'business_leader' => 'nama pemimpin',
                    'business_status' => 'status usaha',
                    'business_usage' => 'kegunaan usaha',
                    'business_address' => 'alamat usaha',
                    'valid_until' => '2025-12-31',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 2, // Personal Domicile
                'purpose' => 'Pengajuan Surat Keterangan Domisili Pribadi',
                'signature_date' => '1999-01-01',
                'signatory_id' => 2,
                'additional_data' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 3, // Marriage Certificate
                'purpose' => 'Pengajuan Surat Keterangan Nikah',
                'signature_date' => '1999-01-01',
                'signatory_id' => 1,
                'additional_data' => json_encode([
                    'applicant_status' => 'Suami',
                    'other_applicant_status' => 'Istri',
                    'nik-1' => '3507114605690004 ', // NIK pasangan
                    'work_location' => 'Batam',
                ]),
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 4, // Institution Domicile
                'purpose' => 'Pengajuan Surat Keterangan Domisili Lembaga',
                'signature_date' => '1999-01-01',
                'signatory_id' => 2,
                'additional_data' => json_encode([
                    'institution_name' => 'Nama Lembaga',
                    'institution_type' => 'Jenis Lembaga',
                    'institution_nss' => 'NSS Lembaga',
                    'institution_npsn' => 'NPSN Lembaga',
                    'institution_founded_date' => '2000-01-01',
                    'institution_leader' => 'Nama Pemimpin Lembaga',
                    'institution_address' => 'Alamat Lembaga',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 5, // Business License
                'purpose' => 'Pengajuan Surat Izin Usaha',
                'signature_date' => '1999-01-01',
                'signatory_id' => 1,
                'additional_data' => json_encode([
                    'business_type' => 'Jenis Usaha',
                    'business_name' => 'Nama Usaha',
                    'business_address' => 'Alamat Usaha',
                    'business_marketing_area' => 'Area Usaha',
                    'business_founded_year' => '2025-12-31',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 6, // Tidak Mampu
                'purpose' => 'Pengajuan Surat Izin Tidak Mampu',
                'signature_date' => '1999-01-01',
                'signatory_id' => 2,
                'additional_data' => json_encode([
                    'nik-1' => '3507116006130002',
                    'family_relationship' => 'Ayah Kandung',
                    'student_class_semester' => '1',
                    'student_current_school' => 'Sekolah A',
                    'student_destination_school' => 'Sekolah B',

                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 7, // Death Certificate
                'purpose' => 'Pengajuan Surat Keterangan Kematian',
                'signature_date' => '1999-01-01',
                'signatory_id' => 1,
                'additional_data' => json_encode([
                    'nik-1' => '3507116006130002',
                    'reporter_relationship' => 'Ayah Kandung',
                    'death_day' => 'Kamis',
                    'death_date' => '2025-12-31',
                    'death_time' => '12:00',
                    'death_location' => 'Tempat Kematian',
                    'death_cause' => 'Penyebab Kematian',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'applicant_id' => 3507110712560003,
                'document_type_id' => 8, // Loss Certificate
                'purpose' => 'Pengajuan Surat Keterangan Kehilangan',
                'signature_date' => '1999-01-01',
                'signatory_id' => 2,
                'additional_data' => json_encode([
                    'arr-item_names' => 'Barang Hilang 1, Barang Hilang 2',
                    'item_owner' => 'Nama Pemilik Barang',
                    'item_id' => '3507116006130002',
                    'loss_day' => 'Kamis',
                    'loss_date' => '2025-12-31',
                    'loss_time' => '12:00',
                    'loss_location' => 'Lokasi Kehilangan',

                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert all documents at once
        DB::table('documents')->insert($documents);
    }
}
