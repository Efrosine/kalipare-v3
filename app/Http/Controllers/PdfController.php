<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\DocumentType;
use App\Services\DocumentService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class PdfController extends Controller
{
    /**
     * @var DocumentService
     */
    protected $documentService;

    /**
     * PdfController constructor.
     *
     * @param DocumentService $documentService
     */
    public function __construct(DocumentService $documentService)
    {
        $this->documentService = $documentService;
    }

    /**
     * Menampilkan pratinjau (preview) dokumen sebagai HTML di browser.
     *
     * @param Document $document
     * @return View
     */
    public function preview(Document $document): View
    {
        return $this->documentService->generatePreview($document);
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
        return $this->documentService->generateDownloadPdf($document);
    }

    /**
     * Menghasilkan PDF dan menampilkannya langsung di browser (inline).
     *
     * @param Document $document
     * @return Response
     */
    public function stream(Document $document): Response
    {
        return $this->documentService->generateStreamPdf($document);
    }

    /**
     * Menghasilkan PDF dummy untuk preview template dokumen.
     * 
     * @param DocumentType $documentType
     * @return Response
     */
    public function streamDummy(DocumentType $documentType): Response
    {
        return $this->documentService->generateDummyPdf($documentType);
    }
}