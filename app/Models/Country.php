<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Country extends Model
{
    use HasFactory;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'slug',

        'title_en',
        'title_ru',
        'title_tk',

        'is_active',
        'position',
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'position' => 'integer',
        'is_active' => 'boolean',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'id', 'country_id');
    }

    /**
     * @return HasMany
     */
    public function countries(): HasMany
    {
        return $this->hasMany(Phone::class, 'id', 'country_id');
    }
}
