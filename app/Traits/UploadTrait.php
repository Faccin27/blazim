<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait UploadTrait
{

    public function upload(UploadedFile $file = null, string $directory)
    {
        if ($file == null || !$file->isValid()) {
            return null;
        }

        $fileName = $file->store($directory);

        return Storage::url($fileName);
    }
}
