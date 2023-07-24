<?php
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function uploadImage($file)
{
    $fileName = Str::random(10) . '.' . $file->getClientOriginalExtension();
    $path = $file->storeAs('images', $fileName, 'public');
    return $path;
}
