<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Prepare data array
        $documentTypes = [
            [
                'type_name' => 'Domisili Usaha',
                'number_registration' => 'No. Reg : 510.4/ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "business_name",
                        "type" => "text",
                        "label" => "Nama Usaha",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_type",
                        "type" => "text",
                        "label" => "Jenis Usaha",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_address",
                        "type" => "text",
                        "label" => "Alamat Usaha",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_status",
                        "type" => "text",
                        "label" => "Status Usaha",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_usage",
                        "type" => "text",
                        "label" => "Penggunaan Usaha",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_leader",
                        "type" => "text",
                        "label" => "Pimpinan Usaha",
                        "is_required" => false
                    ],
                    [
                        "name" => "valid_until",
                        "type" => "date",
                        "label" => "Berlaku Sampai",
                        "is_required" => false
                    ]
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/domisili_perusahaan.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Domisili Pribadi',
                'number_registration' => 'No. Reg : 470/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => null,
                'template' => file_get_contents(
                    database_path('seeders/template/domisi_pribadi.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Surat Keterangan Menikah',
                'number_registration' => 'No. Reg : 470/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "applicant_status",
                        "type" => "text",
                        "label" => "Status Pemohon",
                        "is_required" => true
                    ],
                    [
                        "name" => "other_applicant_status",
                        "type" => "text",
                        "label" => "Status Pemohon Lain",
                        "is_required" => true
                    ],
                    [
                        "name" => "nik-1",
                        "type" => "text",
                        "label" => "NIK Pemohon Lain",
                        "is_required" => true
                    ],
                    [
                        "name" => "work_location",
                        "type" => "text",
                        "label" => "Tempat Kerja",
                        "is_required" => true
                    ],
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/pasutri.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Domisili Lembaga',
                'number_registration' => 'Nomor : 421.1/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "institution_name",
                        "type" => "text",
                        "label" => "Nama Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_type",
                        "type" => "text",
                        "label" => "Jenis Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_nss",
                        "type" => "text",
                        "label" => "NSS Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_npsn",
                        "type" => "text",
                        "label" => "NPSN Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_founded_date",
                        "type" => "date",
                        "label" => "Tanggal Berdiri Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_leader",
                        "type" => "text",
                        "label" => "Pimpinan Lembaga",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_address",
                        "type" => "text",
                        "label" => "Alamat Lembaga",
                        "is_required" => true
                    ],

                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/lembaga.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Surat Izin Usaha',
                'number_registration' => 'Reg. No :  518.3/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "business_type",
                        "type" => "text",
                        "label" => "Jenis Usaha",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_name",
                        "type" => "text",
                        "label" => "Nama Usaha",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_address",
                        "type" => "text",
                        "label" => "Alamat Usaha",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_marketing_area",
                        "type" => "text",
                        "label" => "Wilayah Pemasaran Usaha",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_founded_year",
                        "type" => "date",
                        "label" => "Tahun Berdiri Usaha",
                        "is_required" => true
                    ]
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/usaha.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Surat Keterangan Tidak Mampu',
                'number_registration' => 'No. Reg : 463/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "dtks_id",
                        "type" => "text",
                        "label" => "ID DTKS",
                        "is_required" => false
                    ],
                    [
                        "name" => "nik-1",
                        "type" => "text",
                        "label" => "NIK Pemohon Lain",
                        "is_required" => true
                    ],
                    [
                        "name" => "student_class_semester",
                        "type" => "text",
                        "label" => "Kelas/Semester Siswa",
                        "is_required" => false
                    ],
                    [
                        "name" => "student_current_school",
                        "type" => "text",
                        "label" => "Sekolah Saat Ini",
                        "is_required" => true
                    ],
                    [
                        "name" => "student_destination_school",
                        "type" => "text",
                        "label" => "Sekolah Tujuan",
                        "is_required" => true
                    ],
                    [
                        "name" => "family_relationship",
                        "type" => "text",
                        "label" => "Hubungan Keluarga",
                        "is_required" => true
                    ]

                ]),
                "template" => file_get_contents(
                    database_path('seeders/template/tidak_mampu.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Surat Keterangan Kematian',
                'number_registration' => 'No. Reg : 472.12/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "nik-1",
                        "type" => "text",
                        "label" => "NIK Pemohon Lain",
                        "is_required" => true
                    ],
                    [
                        "name" => "reporter_relationship",
                        "type" => "text",
                        "label" => "Hubungan Pelapor",
                        "is_required" => true
                    ],
                    [
                        "name" => "death_day",
                        "type" => "text",
                        "label" => "Hari Kematian",
                        "is_required" => true
                    ],
                    [
                        "name" => "death_date",
                        "type" => "date",
                        "label" => "Tanggal Kematian",
                        "is_required" => true
                    ],
                    [
                        "name" => "death_time",
                        "type" => "text",
                        "label" => "Waktu Kematian",
                        "is_required" => true
                    ],
                    [
                        "name" => "death_location",
                        "type" => "text",
                        "label" => "Tempat Kematian",
                        "is_required" => true
                    ],
                    [
                        "name" => "death_cause",
                        "type" => "text",
                        "label" => "Penyebab Kematian",
                        "is_required" => true
                    ],


                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/kematian.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Surat Kehilangan',
                'number_registration' => 'No. Reg : 337/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "arr-item_names",
                        "type" => "text",
                        "label" => "Nama Barang",
                        "is_required" => true
                    ],
                    [
                        "name" => "item_owner",
                        "type" => "text",
                        "label" => "Nama Pemilik",
                        "is_required" => true
                    ],
                    [
                        "name" => "item_id",
                        "type" => "text",
                        "label" => "ID Barang",
                        "is_required" => true
                    ],
                    [
                        "name" => "loss_day",
                        "type" => "text",
                        "label" => "Hari Kehilangan",
                        "is_required" => true
                    ],
                    [
                        "name" => "loss_date",
                        "type" => "date",
                        "label" => "Tanggal Kehilangan",
                        "is_required" => true
                    ],
                    [
                        "name" => "loss_time",
                        "type" => "text",
                        "label" => "Waktu Kehilangan",
                        "is_required" => true
                    ],
                    [
                        "name" => "loss_location",
                        "type" => "text",
                        "label" => "Tempat Kehilangan",
                        "is_required" => true
                    ]

                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/kehilangan.blade.php')
                ),
                'created_at' => now(),
                'updated_at' => now(),

            ]
        ];

        // Insert all document types at once
        DB::table('document_types')->insert($documentTypes);
    }
}

