<?php

declare(strict_types=1);

namespace App\Helpers;

use mysql_xdevapi\XSession;

class PictureHelper
{
    /**
     * @param $path
     * @return void
     */
    public static function getExistImage($path): ?string
    {
        $pathArr = explode('/', $path);
        $existImage = $pathArr[count($pathArr) - 1];
        $existImage = explode('.', $existImage);

        return $existImage[count($existImage) - 2];
    }
}
