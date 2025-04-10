<?php

namespace App\Traits;

trait Translatable
{
    public function getTranslated(string $attribute)
    {
        return $this->attributes[$attribute . '_' . app()->getLocale()];
    }
}
