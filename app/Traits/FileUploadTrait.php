<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, ?string $oldPath = null, ?string $destinationPath = 'uploads'): ?string
    {
        if (!$file->isValid()) {
            return null;
        }

        $ignorePath = ['/defaults/avatar.jpg'];

        if($oldPath && File::exists(public_path($oldPath)) && !in_array($oldPath, $ignorePath)) {
            File::delete(public_path($oldPath));
        }

        $folderPath = public_path($destinationPath);
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->move($folderPath, $filename);

        $filePath = $destinationPath . '/' . $filename; // Relative to public directory
        return $filePath;
    }
}
