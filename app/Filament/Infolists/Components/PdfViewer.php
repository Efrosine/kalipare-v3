<?php

namespace App\Filament\Infolists\Components;

use Filament\Infolists\Components\Entry;
use \Closure;

class PdfViewer extends Entry
{
    protected string $view = 'filament.infolists.components.pdf-viewer';
    protected int $height = 600;
    protected string|Closure|null $documentUrl = null;

    public function documentUrl(string|Closure $documentUrl): static
    {
        $this->documentUrl = $documentUrl;
        return $this;
    }

    public function getDocumentUrl(): ?string
    {
        return $this->evaluate($this->documentUrl);
    }

    public function height(int|Closure $height): static
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight(): int
    {
        return $this->evaluate($this->height);
    }
}
