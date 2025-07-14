<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('admin/login');
});

Route::get('/documents/{document}/preview', [PdfController::class, 'preview'])->name('documents.preview');
Route::get('/documents/{document}/download', [PdfController::class, 'download'])->name('documents.download');
Route::get('/documents/{document}/stream', [PdfController::class, 'stream'])->name('documents.stream');
Route::get('/documents/{documentType}/streamDummy', [PdfController::class, 'streamDummy'])->name('documentsType.streamDummy');
