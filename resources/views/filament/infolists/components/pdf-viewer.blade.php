<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div class="w-full">
        <iframe src="{{ $getDocumentUrl() }}" width="100%" height="{{ $getHeight() }}px"
            style="border: 1px solid #ddd; border-radius: 4px;" frameborder="0">
        </iframe>
    </div>
</x-dynamic-component>