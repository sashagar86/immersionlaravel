<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SocialLink extends Model
{
    /* Social Network => Color*/

    protected static $socials = [
        'telegram' => '#38A1F3',
        'vk' => '#4680C2',
        'instagram' => '#E1306C'
    ];

    public static function getSocials()
    {
        return self::$socials;
    }
}
