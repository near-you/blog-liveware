@props(['record'])

@if ($record && $record->file_path)
    <img src="{{ Storage::url($record->file_path) }}" alt="Attachment Image" style="max-height: 100px;">
@endif
