<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <title>Surat Keterangan Domisili</title>
    <style>
        @page {
            size: 21cm 33cm;
            margin: 0.5cm 1.9cm 1cm 1.9cm;
        }

        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        .container {
            width: 100%;
        }

        /* --- KOP SURAT --- */
        .header {
            border-bottom: 4px double #000;
            padding-bottom: 10px;
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
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .letter-title h4 {
            margin: 0;
            font-size: 12pt;
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

        /* Style untuk daftar bernomor */
        .content ol {
            margin-left: 50px;
            padding-left: 20px;
            text-align: justify;
        }

        .content li {
            margin-bottom: 5px;
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
            padding: 1px 0;
            vertical-align: top;
        }

        .data-table .label {
            width: 30%;
        }

        .data-table .separator {
            width: 5%;
        }

        .data-table .value {
            font-weight: bold;
        }

        .value-normal {
            font-weight: normal;
        }

        .purpose {
            font-weight: bold;
            font-style: italic;
        }

        /* --- BLOK TANDA TANGAN --- */
        .signature-table {
            width: 100%;
            margin-top: 0px;
        }

        .signature-cell {
            width: 50%;
            text-align: center;
            vertical-align: bottom;
        }

        .signature-space {
            height: 40px;
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
                    <td class="logo-cell">
                        <img src="{{ $logoBase64 }}" alt="Logo" class="logo" />
                    </td>
                    <td class="text-cell">
                        <div class="header-text">
                            <p class="line1">PEMERINTAH KABUPATEN MALANG</p>
                            <p class="line1">KECAMATAN KALIPARE</p>
                            <p class="line2">DESA KALIPARE</p>
                            <p class="line3">Alamat: Jalan Soekarno-Hatta No. 577 Kalipare Kode Pos 65166</p>
                            <p class="line4">
                                website: desa-kalipare.malangkab.go.id - email: desakalipare@gmail.com
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </header>

        <main>
            <div class="letter-title">
                <h4>SURAT KETERANGAN DOMISILI</h4>
                <p>{!!$document_type->number_registration ?? '-'!!}</p>
            </div>

            <div class="content">
                <p class="indent">
                    Yang bertanda tangan dibawah ini atas nama Kepala Desa Kalipare, Kecamatan Kalipare, Kabupaten
                    Malang, menerangkan dengan sebenarnya bahwa:
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

                <ol>
                    <li>
                        Bahwa orang tersebut diatas adalah benar-benar penduduk Desa Kalipare, Kecamatan Kalipare,
                        Kabupaten Malang;
                    </li>
                    <li>Bahwa orang tersebut diatas adalah benar-benar berdomisili pada alamat tersebut diatas;</li>
                    <li>
                        Surat Keterangan ini dipergunakan khusus untuk :
                        <span class="purpose">{{ $document->purpose ?? '-' }}</span>
                    </li>
                </ol>

                <p class="indent">
                    Demikian surat keterangan ini dibuat atas dasar yang sebenarnya untuk menjadikan periksa dan
                    dipergunakan sebagaimana mestinya bagi yang berkepentingan.
                </p>
            </div>
        </main>

        <footer>
            <table class="signature-table">
                <tr>
                    <td class="signature-cell"></td>

                    <td class="signature-cell">
                        <div>
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
                            <p class="signature-name"> {{ $document->signatory->signatory_name ?? '-' }}
                            </p>
                        </div>
                    </td>
                </tr>
            </table>
        </footer>
    </div>
</body>

</html>