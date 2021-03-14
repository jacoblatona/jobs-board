<?php

namespace App\Http\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait Upload
{
    public function uploadImage($file)
    {
        $name = time() . md5(Str::random(25)) . "." . $file->getClientOriginalExtension();
        Storage::disk('s3')->put($name, file_get_contents($file), 'public');
        Storage::disk('s3')->url($name);

        return Storage::disk('s3')->url($name);
    }
}
