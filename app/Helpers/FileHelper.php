<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;


class FileHelper
{
    public static function optimizeAndConvertToWebP($imageFile, $outputDirectory, $quality = 80)
    {
        // Generate a unique filename using hashName method and file extension
        $newFileName = $imageFile->hashName();

        // Open the image using Intervention Image
        $image = InterventionImage::make($imageFile);

        // Optimize the image and convert to WebP
        $image->encode('webp', $quality);

        $newFileName = explode('.', $newFileName)[0] . ".webp";
        // Save the optimized image in WebP format to Storage
        $outputPath = $outputDirectory . '/' . $newFileName;
        $isUploaded = Storage::disk('public')->put($outputPath, $image);

        if (!$isUploaded) {
            return redirect()->back()->with([
                'message' => 'Image Gagal Di Upload',
                'icon' => 'error',
            ]);
        }

        return $outputPath;
    }

    public static function optimizeBlogPicture($imageFile, $quality = 80)
    {
        // Generate a unique filename using hashName method and file extension
        $newFileName = $imageFile->hashName();

        // Open the image using Intervention Image
        $image = InterventionImage::make($imageFile);

        // Optimize the image and convert to WebP
        $image->encode('webp', $quality);

        $newFileName = explode('.', $newFileName)[0] . ".webp";

        // Save the optimized image in WebP format to Storage
        $outputPath =  'blog-images/' . $newFileName;
        $isUploaded = Storage::disk('public')->put($outputPath, $image);

        if (!$isUploaded) {
            return redirect()->back()->with([
                'message' => 'Image Gagal Di Upload',
                'icon' => 'error',
            ]);
        }

        $image16x9 = InterventionImage::make($imageFile)->fit(1280, 720);
        $image16x9->encode('webp', $quality);
        $outputPath16x9 =  'blog-images/16x9/' . $newFileName;
        $isUploaded = Storage::disk('public')->put($outputPath16x9, $image16x9);
        if (!$isUploaded) {
            if (Storage::disk('public')->exists($outputPath)) {
                Storage::disk('public')->delete($outputPath);
            }
            return redirect()->back()->with([
                'message' => 'Image Gagal Di Upload',
                'icon' => 'error',
            ]);
        }

        $image4x3 = InterventionImage::make($imageFile)->fit(1280, 960);
        $image4x3->encode('webp', $quality);
        $outputPath4x3 =  'blog-images/4x3/' . $newFileName;
        $isUploaded = Storage::disk('public')->put($outputPath4x3, $image4x3);
        if (!$isUploaded) {
            if (Storage::disk('public')->exists($outputPath)) {
                Storage::disk('public')->delete($outputPath);
            }
            if (Storage::disk('public')->exists($outputPath16x9)) {
                Storage::disk('public')->delete($outputPath16x9);
            }
            return redirect()->back()->with([
                'message' => 'Image Gagal Di Upload',
                'icon' => 'error',
            ]);
        }

        return $newFileName;
    }

    public static function removeBlogImage($path)
    {
        $path16x9 = 'blog-images/16x9' . "/" . $path;
        $path4x3 = 'blog-images/4x3' . "/" . $path;
        if (Storage::disk('public')->exists("blog-images/$path")) {
            Storage::disk('public')->delete("blog-images/$path");
        }
        if (Storage::disk('public')->exists($path16x9)) {
            Storage::disk('public')->delete($path16x9);
        }
        if (Storage::disk('public')->exists($path4x3)) {
            Storage::disk('public')->delete($path4x3);
        }
    }

    public static function getStorageImageURL($filePath, $defautImage = '/asset/images/default.png')
    {
        // Default Image Path
        $url = asset($defautImage);

        if (file_exists(public_path($filePath))) {
            $url = asset($filePath);
        }
        // Periksa apakah file ada di storage
        if (Storage::disk('public')->exists($filePath)) {
            // Jika file ditemukan, ambil URL lengkap untuk file gambar di storage dan replace default path
            $url = Storage::disk('public')->url($filePath);
        }

        return $url;
    }
}