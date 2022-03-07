<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\File;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'vk', 'telegram', 'instagram', 'position', 'phone', 'address', 'image'
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static $statuses = [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'afk' => 'Not Disturb'
    ];

    public static function getStatuses()
    {
        return self::$statuses;
    }

    public function getCanEditAttribute()
    {
        return auth()->check()
            && auth()->user()->role == 'admin';
    }

    public function getPhoneFormattedAttribute()
    {
        return preg_replace("/[^\d+]/", '', $this->phone);
    }

    public function getThumbnailAvatarAttribute()
    {
        return $this->getAvatarType();
    }

    public function getOriginalAvatarAttribute()
    {
        return $this->getAvatarType('original');
    }

    public function getLargeAvatarAttribute()
    {
        return $this->getAvatarType('large');
    }

    public function getAvatarType($type = 'thumbnail')
    {
        $avatar = asset('image/users/no-preview.png');

        if ($this->image) {
            $avatar = File::exists(public_path("image/users/$type/") . $this->image)
                ? asset("image/users/$type/{$this->image}")
                : $avatar;
        }

        return  $avatar;
    }
}
