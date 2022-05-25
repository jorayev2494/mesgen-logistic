<?php

namespace App\Models;

use App\Models\Base\AuthModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends AuthModel
{
    public const AVATAR_PATH = '/users/avatar';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'avatar',
        'email',
        'email_code',
        'password',
        'position',
        'position_en',
        'position_ru',
        'position_tk',
        'is_admin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'email_code',
        'email_verified_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'email_verified_at' => 'datetime:d-m-Y H:i:s',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * @return HasMany
     */
    public function tags(): HasMany
    {
        return $this->hasMany(Tag::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function socials(): HasMany
    {
        return $this->hasMany(UserSocial::class, 'user_id', 'id');
    }

    /**
     * @return boolean
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}
