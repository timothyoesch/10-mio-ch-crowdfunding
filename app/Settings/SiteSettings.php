<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class SiteSettings extends Settings
{

    public string $estimated_duration;

    public static function group(): string
    {
        return 'site';
    }
}
