<?php

namespace App\Services;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageService
{
    const ORIGINAL_DIR = 'original';
    const THUMBNAIL_DIR = 'thumbnail';
    const LARGE_DIR = 'large';

    public $sizes = [
        self::THUMBNAIL_DIR => [
            'width' => 300,
            'height' => 300
        ],
        self::LARGE_DIR => [
            'width' => 1200,
            'height' => 900
        ]
    ];

    public static function uploadImage($image, $model)
    {
        $filename = $image->getClientOriginalName();
        $filename = uniqid() . '.' . File::extension($filename);

        $image->move(self::getResizeDirectory(self::ORIGINAL_DIR, $model), $filename);

        self::resizeImage($filename, 300, 300, $model, self::THUMBNAIL_DIR);
        self::resizeImage($filename, 600, 600, $model, self::LARGE_DIR);

        return $filename;
    }

    public static function getUploadDir()
    {
        return public_path('image');
    }

    public static function resizeImage($filename, $width, $height, $model, $dir)
    {
        $resize = Image::make(self::getResizeDirectory(self::ORIGINAL_DIR, $model) . $filename);
        $resize->fit($width, $height);

        $dir = self::getResizeDirectory($dir, $model);

        if(!is_dir($dir)) {
            File::makeDirectory($dir);
        }

        $resize->save($dir . $filename);
    }

    public static function getResizeDirectory($dir, $model)
    {

        return self::getUploadDir() . '/' . $model . '/' . $dir . '/';
    }
}
