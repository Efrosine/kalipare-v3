<?php

namespace App\Http\Controllers;

use App\Models\Document; // Pastikan namespace Model Anda benar
use App\Models\DocumentType;
use App\Models\FamilyMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * Method privat untuk merender template Blade dari database menjadi string HTML.
     * Ini digunakan oleh semua method publik lainnya untuk menghindari duplikasi kode.
     *
     * @param Document $document
     * @return string
     */
    private function renderDocumentHtml(Document $document): string
    {
        // Eager load relationship untuk performa yang lebih baik
        $document->load('applicant', 'documentType');

        // 1. Definisikan path ke gambar logo Anda (gunakan Storage facade untuk akses storage)
        $pathToLogo = storage_path('app/public/images/logo.png');

        // 2. Ubah gambar menjadi string Base64
        // Ini adalah cara paling andal untuk memastikan gambar selalu tampil di PDF
        $logoBase64 = '';
        if (file_exists($pathToLogo)) {
            $type = pathinfo($pathToLogo, PATHINFO_EXTENSION);
            $imageData = file_get_contents($pathToLogo);
            $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        }

        // 1. Ambil template mentah dari database
        $template = $document->documentType->template;

        // Persiapkan array untuk menyimpan applicant tambahan
        $otherApplicants = [];

        // Jika ada additional_data, periksa apakah ada field "nik-n" untuk tambahan applicant
        if (!empty($document->additional_data)) {
            $additional_data = $document->additional_data;

            // Loop melalui additional_data untuk mencari field yang berformat "nik-n"
            foreach ($additional_data as $key => $value) {
                // Jika ditemukan field "nik-n" dimana n adalah angka (bisa 1, 2, dst)
                if (preg_match('/^nik-(\d+)$/', $key, $matches)) {
                    $n = $matches[1]; // Ambil nilai n dari regex
                    $nik = $value;

                    // Query FamilyMember berdasarkan NIK
                    $familyMember = FamilyMember::where('national_id_number', $nik)->first();

                    // Hanya tambahkan ke array jika FamilyMember ditemukan
                    if ($familyMember) {
                        $otherApplicants[$n] = $familyMember;
                    }
                }
            }
        }

        // 2. Siapkan data untuk di-passing ke Blade
        $data = [
            'document' => $document,
            'document_type' => $document->documentType,
            'applicant' => $document->applicant,
            'other_applicants' => $otherApplicants, // Tambahkan array other_applicants
            'additional_data' => $document->additional_data ?? [],
            'logoBase64' => $logoBase64,
        ];

        // dd($data);

        // 3. Render template string menggunakan engine Blade dan kembalikan hasilnya
        return Blade::render($template, $data);
    }

    /**
     * Menampilkan pratinjau (preview) dokumen sebagai HTML di browser.
     *
     * @param Document $document
     * @return View
     */
    public function preview(Document $document): View
    {
        // Render HTML dari dokumen
        $html = $this->renderDocumentHtml($document);

        // Kembalikan view yang akan menampilkan HTML mentah tersebut
        // Anda perlu membuat file view ini.
        return view('documents.preview', ['html' => $html]);
    }

    /**
     * Menghasilkan PDF dan langsung memulai proses download.
     * Ini yang Anda butuhkan untuk tombol "Download".
     *
     * @param Document $document
     * @return Response
     */
    public function download(Document $document): Response
    {
        // Render HTML dari dokumen
        $html = $this->renderDocumentHtml($document);

        // Buat PDF dari HTML dan panggil method download()
        $pdf = Pdf::loadHTML($html);

        // Argumen di method download() adalah nama file yang akan diunduh
        return $pdf->download($document->document_number . '.pdf');
    }

    /**
     * Menghasilkan PDF dan menampilkannya langsung di browser (inline).
     *
     * @param Document $document
     * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response
     */
    public function stream(Document $document)
    {
        // Render HTML dari dokumen
        $html = $this->renderDocumentHtml($document);

        // Buat PDF dari HTML dan panggil method stream()
        $pdf = Pdf::loadHTML($html);


        // Nama file default saat user ingin menyimpan
        $filename = $document->applicant->name . '.pdf';

        // Return the PDF as a streamed response with the right headers
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    public function streamDummy(DocumentType $documentType)
    {
        $pathToLogo = storage_path('app/public/images/logo.png');

        // 2. Ubah gambar menjadi string Base64
        // Ini adalah cara paling andal untuk memastikan gambar selalu tampil di PDF
        $logoBase64 = '';
        if (file_exists($pathToLogo)) {
            $type = pathinfo($pathToLogo, PATHINFO_EXTENSION);
            $imageData = file_get_contents($pathToLogo);
            $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        }
        $template = $documentType->template;

        $data = [
            'logoBase64' => $logoBase64,
            'document_type' => $documentType,
        ];
        // dd($data);
        // Render HTML dari template
        $html = Blade::render($template, $data);

        // Buat PDF dari HTML dan panggil method stream()
        $pdf = Pdf::loadHTML($html);


        // Nama file default saat user ingin menyimpan
        $filename = $documentType->type_name . '.pdf';

        // Return the PDF as a streamed response with the right headers
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);


    }
}