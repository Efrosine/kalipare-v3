<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Surat Pengantar Laporan Kehilangan</title>
    <style>
        @page {
            size: 21cm 33cm;
            margin: 0.7cm 1.5cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 11pt;
            /* Sedikit disesuaikan untuk surat ini */
            color: #000;
        }

        p,
        td,
        th {
            line-height: 1.5;
        }

        .container {
            width: 100%;
        }

        /* --- KOP SURAT --- */
        .header {
            border-bottom: 4px double #000;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
        }

        .logo-cell {
            width: 100px;
            vertical-align: middle;
            text-align: center;
        }

        .text-cell {
            vertical-align: middle;
            text-align: center;
        }

        .logo {
            width: 90px;
            height: auto;
        }

        .header-text p {
            margin: 0;
            line-height: 1.2;
        }

        .header-text .line1 {
            font-size: 16pt;
            font-weight: bold;
        }

        .header-text .line2 {
            font-size: 18pt;
            font-weight: bold;
        }

        .header-text .line3 {
            font-size: 11pt;
        }

        .header-text .line4 {
            font-size: 11pt;
            font-style: italic;
        }

        /* --- JUDUL SURAT --- */
        .letter-title {
            text-align: center;
            margin-bottom: 15px;
        }

        .letter-title h4 {
            margin: 0;
            font-size: 14pt;
            text-decoration: underline;
            font-weight: bold;
        }

        .letter-title p {
            margin: 0;
            font-size: 12pt;
        }

        /* --- KONTEN UTAMA --- */
        .content {
            text-align: justify;
        }

        .content p {
            margin: 10px 0;
        }

        .indent {
            text-indent: 50px;
        }

        /* --- TABEL DATA --- */
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 10px 50px;
        }

        .data-table td {
            padding: 1px 2px;
            vertical-align: top;
        }

        .data-table .label {
            width: 30%;
        }

        .data-table .separator {
            width: 3%;
        }

        .data-table .value {
            font-weight: bold;
        }

        .value-normal {
            font-weight: normal;
        }

        /* --- TABEL LAPORAN KEHILANGAN --- */
        .loss-report-table {
            width: 100%;
            border: 1.5px solid black;
            border-collapse: collapse;
            font-size: 10pt;
            margin: 15px 0;
        }

        .loss-report-table th,
        .loss-report-table td {
            border: 1px solid black;
            padding: 4px;
            text-align: center;
            vertical-align: middle;
        }

        .loss-report-table .item-name-col {
            text-align: left;
        }


        /* --- BLOK TANDA TANGAN --- */
        .signature-table {
            width: 100%;
            margin-top: 20px;
        }

        .signature-cell {
            width: 50%;
            text-align: center;
            vertical-align: top;
        }

        .signature-space {
            height: 70px;
        }

        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <table class="header-table">
                <tr>
                    <td class="logo-cell"><img src="{{ $logoBase64 }}" alt="Logo" class="logo" /></td>
                    <td class="text-cell">
                        <div class="header-text">
                            <p class="line1">PEMERINTAH KABUPATEN MALANG</p>
                            <p class="line1">KECAMATAN KALIPARE</p>
                            <p class="line2">DESA KALIPARE</p>
                            <p class="line3">Alamat: Jalan Soekarno-Hatta No. 577 Kalipare Kode Pos 65166</p>
                            <p class="line4">website: desa-kalipare.malangkab.go.id - email: desakalipare@gmail.com</p>
                        </div>
                    </td>
                </tr>
            </table>
        </header>

        <main>
            <div class="letter-title">
                <h4>SURAT PENGANTAR LAPORAN KEHILANGAN</h4>
                <p>{!! $document->document_number ?? '-' !!}</p>
            </div>

            <div class="content">
                <p class="indent">
                    Yang bertanda tangan di bawah ini saya warga Desa Kalipare, Kecamatan Kalipare, Kabupaten Malang:
                </p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="separator">:</td>
                        <td class="value">{{$applicant->name ?? '-'}}</td>
                    </tr>
                    <tr>
                        <td class="label">NIK</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->national_id_number ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat Lahir</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->place_of_birth ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Tanggal Lahir</td>
                        <td class="separator">:</td>
                        <td>
                            <table style="width: 100%; border-collapse: collapse">
                                <tr>
                                    <td class="value" style="width: 60%; text-align: left; padding: 0; font-weight: bold">
                                        {{ $applicant->date_of_birth ?? '-' }}
                                    </td>
                                    <td style="width: 40%; text-align: left; padding: 0; font-weight: normal">
                                        Umur:
                                        <span style="font-weight: bold">{{ $applicant->age ?? '-' }}</span>
                                        Tahun
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Jenis Kelamin</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->gender ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Agama</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->religion ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Status Perkawinan</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->marital_status ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="separator">:</td>
                        <td class="value">{{ $applicant->occupation ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td class="label">Kewarganegaraan</td>
                        <td class="separator">:</td>
                        <td class="value">Indonesia</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat</td>
                        <td class="separator">:</td>
                        <td class="value value-normal">
                            {{ isset($applicant) && $applicant->familyCard ? $applicant->familyCard->fullAddress() :
    '-' }}
                        </td>
                    </tr>
                </table>

                <p class="indent">
                    Saya melaporkan kepada Pemerintah Desa <b>TELAH KEHILANGAN</b> barang berupa:
                </p>

                <table class="loss-report-table">
                    <thead>
                        <tr>
                            <th rowspan="2">Nama Barang</th>
                            <th rowspan="2">Atas Nama</th>
                            <th rowspan="2">No. ID</th>
                            <th colspan="3">Waktu</th>
                        </tr>
                        <tr>
                            <th>Hari</th>
                            <th>Tanggal</th>
                            <th>Pukul</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="item-name-col">
                                @if(isset($additional_data['arr-item_names']) && is_array($additional_data['arr-item_names']))
                                    @foreach($additional_data['arr-item_names'] as $itemName)
                                        {{ $itemName ?? '-' }}<br />
                                    @endforeach
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $additional_data['item_owner'] ?? '-' }}</td>
                            <td>{{ $additional_data['item_id'] ?? '-' }}</td>
                            <td>{{ $additional_data['loss_day'] ?? '-' }}</td>
                            <td>{{ isset($additional_data['loss_date']) ? \Carbon\Carbon::parse($additional_data['loss_date'])->format('d/m/Y') : '-' }}</td>
                            <td>{{ $additional_data['loss_time'] ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>

                <p>Adapun kehilangan tersebut terjadi pada saat di: <b>{{ $additional_data['loss_location'] ?? '-' }}</b></p>

                <p class="indent">
                    Demikian surat keterangan ini dibuat atas dasar sebenarnya untuk menjadikan periksa dan dipergunakan sebagaimana mestinya bagi yang berkepentingan.
                </p>
            </div>
        </main>

        <footer>
            <table class="signature-table">
                <tr>
                    <td class="signature-cell">
                        <p>Mengetahui,<br />a.n. Kepala Desa Kalipare<br />Sekretaris Desa</p>
                        <div class="signature-space"></div>
                        <p class="signature-name">(AHMAD YUSRO)</p>
                    </td>
                    <td class="signature-cell">
                        <p>Kalipare, {{ $document->signature_date ?? '-' }}</p>
                        <p>Tanda Tangan Pelapor,</p>
                        <div class="signature-space"></div>
                        <p class="signature-name">({{ $applicant->name ?? '..............................' }})</p>
                    </td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>