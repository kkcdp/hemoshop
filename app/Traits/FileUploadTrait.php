<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, $destinationPath = 'uploads'): ?string
    {
        if (!$file->isValid()) {
            return null;
        }

        $folderPath = public_path($destinationPath);
        $filename = Str::uuid().'.'.$file->getClientOriginalExtension();

        $file->move($folderPath, $filename);

        $filePath = $destinationPath . '/' . $filename; // Relative to public directory
        return $filePath;
    }
}