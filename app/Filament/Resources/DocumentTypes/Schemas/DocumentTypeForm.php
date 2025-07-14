<?php

namespace App\Filament\Resources\DocumentTypes\Schemas;


use Filament\Forms\Components\CodeEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class DocumentTypeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(1)
            ->components([
                Section::make('Informasi Dasar')
                    ->schema([
                        TextInput::make('type_name')
                            ->label('Nama Jenis Dokumen')
                            ->required()
                            ->helperText('Nama lengkap jenis dokumen.'),
                        TextInput::make('number_registration')
                            ->label('Nomor Registrasi')
                            ->required()
                            ->helperText('Nomor registrasi jenis dokumen.'),
                    ]),

                Section::make('Pembuat Bidang Formulir')
                    ->description('Tentukan bidang tambahan yang diperlukan untuk jenis dokumen ini.')
                    ->collapsed()

                    ->schema([
                        Repeater::make('form_structure')
                            ->label('Struktur Formulir')
                            ->addActionLabel('Tambah Bidang Baru')
                            ->columns(2)
                            ->schema([
                                TextInput::make('name')
                                    ->label('Nama Kunci')
                                    ->required()
                                    ->helperText('Kunci bidang (tanpa spasi, misal: "alasan_permohonan").'),
                                TextInput::make('label')
                                    ->label('Label')
                                    ->required()
                                    ->helperText('Label ramah pengguna yang ditampilkan pada formulir.'),
                                Select::make('type')
                                    ->label('Tipe')
                                    ->required()
                                    ->options([
                                        'text' => 'Teks',
                                        'textarea' => 'Area Teks',
                                        'date' => 'Tanggal',
                                        'number' => 'Angka',
                                    ]),
                                Toggle::make('is_required')
                                    ->label('Apakah bidang ini wajib diisi?')
                                    ->default(false),
                            ]),
                    ]),

                Section::make('Editor Template PDF')
                    ->description('Rancang output PDF. Gunakan variabel Blade untuk memasukkan data.')
                    ->collapsed()
                    ->schema([
                        CodeEditor::make('template')
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Gunakan variabel seperti {{ $applicant->name }} atau {{ $additional_data[\'nama_bidang_anda\'] }}. Anda dapat menggunakan sintaks Blade apa pun.')
                    ]),
            ]);
    }

}
