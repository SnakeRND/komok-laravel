<?php


namespace App\Services;


use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ResizeService
{
    /**
     * @param $path
     * @param $resizeDisk
     * @param $width
     * @param $height
     * @param string $encode
     * @return string
     */
    public static function resize($path, $resizeDisk, $width, $height, string $encode = 'jpg'): string
    {
        $pathArr = explode('/', $path);
        $suffix = '_' . $width . 'x' . $height;
        $imageName = $pathArr[count($pathArr) - 1];
        $existImage = explode('.', $imageName);
        $existImage = $existImage[0] . $suffix . '.' . $existImage[1];

        if (Storage::exists('public/resize/' . $existImage)) {
            return 'resize/' . $existImage;
        }

        $img = Image::make($path);
        $resize = $img->fit($width, $height)->encode($encode);
        $resizePath = "resize/{$img->filename}{$suffix}.jpg";
        $resize->save(Storage::path($resizeDisk . '/' . $resizePath));

        return $resizePath;
    }
}
