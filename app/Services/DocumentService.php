<?php

namespace App\Services;

use App\Models\Document;
use App\Models\DocumentType;
use App\Models\FamilyMember;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Blade;
use Illuminate\Http\Response;

class DocumentService
{
    /**
     * Render document template as HTML string
     *
     * @param Document $document
     * @return string
     */
    public function renderDocumentHtml(Document $document): string
    {
        // Eager load relationship untuk performa yang lebih baik
        $document->load('applicant', 'documentType');

        // 1. Definisikan path ke gambar logo Anda
        $pathToLogo = storage_path('app/public/images/logo.png');

        // 2. Ubah gambar menjadi string Base64
        $logoBase64 = '';
        if (file_exists($pathToLogo)) {
            $type = pathinfo($pathToLogo, PATHINFO_EXTENSION);
            $imageData = file_get_contents($pathToLogo);
            $logoBase64 = 'data:image/' . $type . ';base64,' . base64_encode($imageData);
        }

        // Ambil template mentah dari database
        $template = $document->documentType->template;

        // Persiapkan array untuk menyimpan applicant tambahan
        $otherApplicants = [];

        // Jika ada additional_data, periksa apakah ada field "nik-n" dan "arr-name-n"
        if (!empty($document->additional_data)) {
            $additional_data = $document->additional_data;

            // Pertama, konversi semua field dengan prefix "arr-" ke array
            foreach ($additional_data as $key => $value) {
                // Jika ditemukan field "arr-name" dimana name adalah nama field
                if (preg_match('/^arr-([a-zA-Z0-9_]+)$/', $key, $matches)) {
                    // Konversi teks yang dipisahkan koma menjadi array
                    $additional_data[$key] = !empty($value) ? array_map('trim', explode(',', $value)) : [];
                }
            }

            // Perbarui data di document untuk penggunaan di template
            $document->additional_data = $additional_data;

            // Kemudian cari field "nik-n" untuk tambahan applicant
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

        // Siapkan data untuk di-passing ke Blade
        $data = [
            'document' => $document,
            'document_type' => $document->documentType,
            'applicant' => $document->applicant,
            'other_applicants' => $otherApplicants,
            'additional_data' => $document->additional_data ?? [],
            'logoBase64' => $logoBase64,
        ];

        // Render template string menggunakan engine Blade dan kembalikan hasilnya
        return Blade::render($template, $data);
    }

    /**
     * Generate a view for document preview
     *
     * @param Document $document
     * @return View
     */
    public function generatePreview(Document $document): View
    {
        $html = $this->renderDocumentHtml($document);
        return view('documents.preview', ['html' => $html]);
    }

    /**
     * Generate PDF for download
     *
     * @param Document $document
     * @return Response
     */
    public function generateDownloadPdf(Document $document): Response
    {
        $html = $this->renderDocumentHtml($document);
        $pdf = Pdf::loadHTML($html);
        return $pdf->download($document->document_number . '.pdf');
    }

    /**
     * Generate PDF for streaming in browser
     *
     * @param Document $document
     * @return Response
     */
    public function generateStreamPdf(Document $document): Response
    {
        $html = $this->renderDocumentHtml($document);
        $pdf = Pdf::loadHTML($html);
        $filename = $document->applicant->name . '.pdf';

        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }

    /**
     * Generate dummy PDF from document type template
     *
     * @param DocumentType $documentType
     * @return Response
     */
    public function generateDummyPdf(DocumentType $documentType): Response
    {
        $pathToLogo = storage_path('app/public/images/logo.png');

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

        $html = Blade::render($template, $data);
        $pdf = Pdf::loadHTML($html);
        $filename = $documentType->type_name . '.pdf';

        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '"',
        ]);
    }
}
