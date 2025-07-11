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
                'type_name' => 'Business Domicile',
                'number_registration' => '510.4/ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "business_name",
                        "type" => "text",
                        "label" => "Business Name",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_type",
                        "type" => "text",
                        "label" => "Business Type",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_address",
                        "type" => "text",
                        "label" => "Business Address",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_status",
                        "type" => "text",
                        "label" => "Business Status",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_usage",
                        "type" => "text",
                        "label" => "Business Usage",
                        "is_required" => false
                    ],
                    [
                        "name" => "business_leader",
                        "type" => "text",
                        "label" => "Business Leader",
                        "is_required" => false
                    ],
                    [
                        "name" => "valid_until",
                        "type" => "date",
                        "label" => "Valid Until",
                        "is_required" => false
                    ]
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/domisili_perusahaan.html')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Personal Domicile',
                'number_registration' => 'No. Reg : 470/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => null,
                'template' => file_get_contents(
                    database_path('seeders/template/domisi_pribadi.html')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Marriage Certificate',
                'number_registration' => 'No. Reg : 470/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "applicant_status",
                        "type" => "text",
                        "label" => "Applicant Status",
                        "is_required" => true
                    ],
                    [
                        "name" => "other_applicant_status",
                        "type" => "text",
                        "label" => "Other Applicant Status",
                        "is_required" => true
                    ],
                    [
                        "name" => "nik-1",
                        "type" => "text",
                        "label" => "Other Applicant NIK",
                        "is_required" => true
                    ],
                    [
                        "name" => "work_location",
                        "type" => "text",
                        "label" => "Work Location",
                        "is_required" => true
                    ],
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/pasutri.html')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Institution Domicile',
                'number_registration' => 'Nomor : 421.1/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "institution_name",
                        "type" => "text",
                        "label" => "Institution Name",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_type",
                        "type" => "text",
                        "label" => "Institution Type",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_nss",
                        "type" => "text",
                        "label" => "Institution NSS",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_npsn",
                        "type" => "text",
                        "label" => "Institution NPSN",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_founded_date",
                        "type" => "date",
                        "label" => "Institution Founded Date",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_leader",
                        "type" => "text",
                        "label" => "Institution Leader",
                        "is_required" => true
                    ],
                    [
                        "name" => "institution_address",
                        "type" => "text",
                        "label" => "Institution Address",
                        "is_required" => true
                    ],

                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/lembaga.html')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'type_name' => 'Business License',
                'number_registration' => 'Reg. No :  518.3/&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;/35.07.11.2002/2025',
                'form_structure' => json_encode([
                    [
                        "name" => "business_type",
                        "type" => "text",
                        "label" => "Business Type",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_name",
                        "type" => "text",
                        "label" => "Business Name",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_address",
                        "type" => "text",
                        "label" => "Business Address",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_marketing_area",
                        "type" => "text",
                        "label" => "Business Marketing Area",
                        "is_required" => true
                    ],
                    [
                        "name" => "business_founded_year",
                        "type" => "date",
                        "label" => "Business Founded Year",
                        "is_required" => true
                    ]
                ]),
                'template' => file_get_contents(
                    database_path('seeders/template/usaha.html')
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
                        "label" => "DTKS ID",
                        "is_required" => false
                    ],
                    [
                        "name" => "nik-1",
                        "type" => "text",
                        "label" => "Other Applicant NIK",
                        "is_required" => true
                    ],
                    [
                        "name" => "student_class_semester",
                        "type" => "text",
                        "label" => "Student Class/Semester",
                        "is_required" => false
                    ],
                    [
                        "name" => "student_current_school",
                        "type" => "text",
                        "label" => "Student Current School",
                        "is_required" => true
                    ],
                    [
                        "name" => "student_destination_school",
                        "type" => "text",
                        "label" => "Student Destination School",
                        "is_required" => true
                    ],
                    [
                        "name" => "family_relationship",
                        "type" => "text",
                        "label" => "Family Relationship",
                        "is_required" => true
                    ]

                ]),
                "template" => file_get_contents(
                    database_path('seeders/template/tidak_mampu.html')
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
                        "label" => "Other Applicant NIK",
                        "is_required" => true
                    ],
                    [
                        "name" => "reporter_relationship",
                        "type" => "text",
                        "label" => "Hubungan pelapor",
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
                    database_path('seeders/template/kematian.html')
                ),
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        // Insert all document types at once
        DB::table('document_types')->insert($documentTypes);
    }
}
