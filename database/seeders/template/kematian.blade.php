<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Formulir Pelaporan Kematian</title>
    <style>
        @page {
            size: 21cm 33cm;
            margin: 0.7cm 0.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 10pt;
            color: #000;
        }

        p,
        td {
            line-height: 1.4;
        }

        .vertical-line {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-left: 1px dashed #555;
        }

        .two-column-layout {
            width: 100%;
            border-collapse: collapse;
        }

        .column {
            width: 50%;
            vertical-align: top;
        }

        .column-left {
            padding-right: 0.5cm;
        }

        .column-right {
            padding-left: 0.5cm;
        }

        .form-instance {
            width: 100%;
            page-break-after: avoid;
        }

        .border-wrapper {
            border: 1px solid #000;
            padding: 0.5cm;
            margin-top: 15px;
        }

        .lampiran-box-container {
            text-align: right;
            margin-bottom: 10px;
        }

        .lampiran-box {
            border: 1.5px solid #000;
            padding: 1px 6px;
            font-weight: bold;
            display: inline-block;
        }

        .form-info-table {
            font-size: 10pt;
            border-collapse: collapse;
        }

        .form-info-table td {
            padding: 0px 2px;
        }

        .form-info-table .label {
            width: 100px;
        }

        .letter-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .letter-title h4 {
            margin: 0;
            font-size: 10pt;
            text-decoration: underline;
            font-weight: bold;
        }

        .letter-title p {
            margin: 0;
            font-size: 10pt;
        }

        .content {
            text-align: justify;
            font-size: 10pt;
        }

        .content p {
            margin: 5px 0;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0;
            font-size: 10pt;
        }

        .data-table td {
            padding: 1px 2px;
            vertical-align: top;
        }

        .data-table .label {
            width: 35%;
        }

        .data-table .separator {
            width: 3%;
        }

        .data-table .value {
            font-weight: bold;
        }

        .purpose {
            font-weight: bold;
        }

        .signature-table {
            width: 100%;
            font-size: 10pt;
        }

        .signature-cell {
            width: 50%;
            text-align: center;
            vertical-align: bottom;
        }

        .signature-space {
            height: 50px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="vertical-line"></div>
    <table class="two-column-layout">
        <tr>
            <td class="column column-left">
                <div class="form-instance">
                    <div class="lampiran-box-container">
                        <span class="lampiran-box">Lampiran A-5</span>
                    </div>
                    <table class="form-info-table">
                        <tr>
                            <td class="label">Pemerintah Desa</td>
                            <td>:</td>
                            <td>Kalipare</td>
                        </tr>
                        <tr>
                            <td class="label">Kecamatan</td>
                            <td>:</td>
                            <td>Kalipare</td>
                        </tr>
                        <tr>
                            <td class="label">Kabupaten</td>
                            <td>:</td>
                            <td>Malang</td>
                        </tr>
                    </table>
                    <div class="border-wrapper">
                        <main>
                            <div class="letter-title">
                                <h4>FORMULIR PELAPORAN KEMATIAN</h4>
                                <p>{!!$document_type->number_registration ?? '-'!!}</p>
                            </div>
                            <div class="content">
                                <p>Yang bertanda tangan di bawah ini:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Nama</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">NIK</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->national_id_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tempat/Tgl Lahir</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ $applicant->place_of_birth ?? '-' }}, {{ $applicant->date_of_birth ??
    '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Pekerjaan</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->occupation ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Alamat</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($applicant) && $applicant->familyCard ?
    $applicant->familyCard->fullAddress() : '-' }}
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    Hubungan dengan yang Almarhum/Almarhumah:
                                    <b class="purpose">{{ $additional_data['reporter_relationship'] ?? '-' }}</b>
                                </p>
                                <p>Melaporkan bahwa:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Nama</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->name : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">NIK</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ?
    $other_applicants[1]->national_id_number : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Jenis Kelamin</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->gender : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tempat/Tgl Lahir</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->place_of_birth :
    '-' }}, {{ isset($other_applicants[1]) ?
    $other_applicants[1]->date_of_birth : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Agama</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->religion : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Alamat</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($other_applicants[1]) && $other_applicants[1]->familyCard ?
    $other_applicants[1]->familyCard->fullAddress() : '-' }}
                                        </td>
                                    </tr>
                                </table>
                                <p>Telah meninggal dunia pada:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Hari</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_day'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tanggal</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($additional_data['death_date']) ?
    \Carbon\Carbon::parse($additional_data['death_date'])->translatedFormat('d
                                                F Y') : '-' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">Pukul</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_time'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Bertempat di</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_location'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Sebab Kematian</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_cause'] ?? '-' }}</td>
                                    </tr>
                                </table>
                                <p>
                                    Demikian surat keterangan ini dibuat atas dasar keterangan pelapor yang
                                    dipergunakan khusus untuk
                                    <b class="purpose">{{ $document->purpose ?? '-' }}</b> sehingga dapat
                                    dipergunakan sebagaimana mestinya.
                                </p>
                            </div>
                        </main>
                        <p style="text-align: center">Kalipare, {{ $document->signature_date ?? '-' }}</p>

                        <footer>
                            <table class="signature-table">
                                <tr>
                                    <td class="signature-cell">
                                        <p>
                                            Kalipare, {{ $document->signature_date ?? '-' }}<br />
                                            @if(($document->signatory->signatory_position ?? '') === 'Kepala Desa')
                                                Kepala Desa Kalipare<br />
                                            @else
                                                a.n Kepala Desa Kalipare<br />
                                                {{ $document->signatory->signatory_position ?? '-' }}
                                            @endif
                                        </p>
                                        <div class="signature-space"></div>
                                        <p class="signature-name">{{ $document->signatory->signatory_name ?? '-' }}</p>
                                    </td>
                                    <td class="signature-cell">
                                        <p>Pelapor,</p>
                                        <div class="signature-space"></div>
                                        <p class="signature-name">
                                            {{ $applicant->name ?? '(..............................)' }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </footer>
                    </div>
                </div>
            </td>
            <td class="column column-right">
                <div class="form-instance">
                    <div class="lampiran-box-container">
                        <span class="lampiran-box">Lampiran A-5</span>
                    </div>
                    <table class="form-info-table">
                        <tr>
                            <td class="label">Pemerintah Desa</td>
                            <td>:</td>
                            <td>Kalipare</td>
                        </tr>
                        <tr>
                            <td class="label">Kecamatan</td>
                            <td>:</td>
                            <td>Kalipare</td>
                        </tr>
                        <tr>
                            <td class="label">Kabupaten</td>
                            <td>:</td>
                            <td>Malang</td>
                        </tr>
                    </table>
                    <div class="border-wrapper">
                        <main>
                            <div class="letter-title">
                                <h4>FORMULIR PELAPORAN KEMATIAN</h4>
                                <p>{!!$document_type->number_registration ?? '-'!!}</p>
                            </div>
                            <div class="content">
                                <p>Yang bertanda tangan di bawah ini:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Nama</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->name ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">NIK</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->national_id_number ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tempat/Tgl Lahir</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ $applicant->place_of_birth ?? '-' }}, {{ $applicant->date_of_birth ??
    '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Pekerjaan</td>
                                        <td class="separator">:</td>
                                        <td class="value">{{ $applicant->occupation ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Alamat</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($applicant) && $applicant->familyCard ?
    $applicant->familyCard->fullAddress() : '-' }}
                                        </td>
                                    </tr>
                                </table>
                                <p>
                                    Hubungan dengan yang Almarhum/Almarhumah:
                                    <b class="purpose">{{ $additional_data['reporter_relationship'] ?? '-' }}</b>
                                </p>
                                <p>Melaporkan bahwa:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Nama</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->name : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">NIK</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ?
    $other_applicants[1]->national_id_number : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Jenis Kelamin</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->gender : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tempat/Tgl Lahir</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->place_of_birth :
    '-' }}, {{ isset($other_applicants[1]) ?
    $other_applicants[1]->date_of_birth : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Agama</td>
                                        <td class="separator">:</td>
                                        <td class="value">
                                            {{ isset($other_applicants[1]) ? $other_applicants[1]->religion : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="label">Alamat</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($other_applicants[1]) && $other_applicants[1]->familyCard ?
    $other_applicants[1]->familyCard->fullAddress() : '-' }}
                                        </td>
                                    </tr>
                                </table>
                                <p>Telah meninggal dunia pada:</p>
                                <table class="data-table">
                                    <tr>
                                        <td class="label">Hari</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_day'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Tanggal</td>
                                        <td class="separator">:</td>
                                        <td>
                                            {{ isset($additional_data['death_date']) ?
    \Carbon\Carbon::parse($additional_data['death_date'])->translatedFormat('d
                                                F Y') : '-' }}
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="label">Pukul</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_time'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Bertempat di</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_location'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="label">Sebab Kematian</td>
                                        <td class="separator">:</td>
                                        <td>{{ $additional_data['death_cause'] ?? '-' }}</td>
                                    </tr>
                                </table>
                                <p>
                                    Demikian surat keterangan ini dibuat atas dasar keterangan pelapor yang
                                    dipergunakan khusus untuk
                                    <b class="purpose">{{ $document->purpose ?? '-' }}</b> sehingga dapat
                                    dipergunakan sebagaimana mestinya.
                                </p>
                            </div>
                        </main>
                        <footer>
                            <p style="text-align: center">Kalipare, {{ $document->signature_date ?? '-' }}</p>
                            <table class="signature-table">
                                <tr>
                                    <td class="signature-cell">
                                        <p>
                                            Kalipare, {{ $document->signature_date ?? '-' }}<br />
                                            @if(($document->signatory->signatory_position ?? '') === 'Kepala Desa')
                                                Kepala Desa Kalipare<br />
                                            @else
                                                a.n Kepala Desa Kalipare<br />
                                                {{ $document->signatory->signatory_position ?? '-' }}
                                            @endif
                                        </p>
                                        <div class="signature-space"></div>
                                        <p class="signature-name">{{ $document->signatory->signatory_name ?? '-' }}</p>
                                    </td>
                                    <td class="signature-cell">
                                        <p>Pelapor,</p>
                                        <div class="signature-space"></div>
                                        <p class="signature-name">
                                            {{ $applicant->name ?? '(..............................)' }}
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </footer>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</body>

</html>