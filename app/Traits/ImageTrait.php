<?php

namespace App\Traits;

use Intervention\Image\Laravel\Facades\Image;

trait ImageTrait
{

    public function crop(string $file, int $x, int $y, int $width, int $height, string $background = 'ffffff')
    {
        if (empty($file)) {
            return;
        }

        $img = Image::read(public_path($file));

        $img->crop($width, $height, $x, $y, $background);

        $img->save(public_path($file), 100);
    }

    public function resize(string $file, int $width = 1200, int $height = 900)
    {
        if (empty($file)) {

            return null;
        }

        $img = Image::read(public_path($file));

        $img->scaleDown($width, $height);

        $img->save(public_path($file), 100);
    }

    public function resizeFit(string $file, int $width = 1200, int $height = 900)
    {
        if (empty($file)) {

            return null;
        }

        $img = Image::read(public_path($file));

        $img->cover($width, $height);

        $img->save(public_path($file), 100);
    }
}
