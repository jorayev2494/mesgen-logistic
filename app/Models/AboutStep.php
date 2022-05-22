<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutStep extends Model
{
    use HasFactory;

    /**
     * @var array $fillable
     */
    protected $fillable = [
        'char_en',
        'char_ru',
        'char_tk',
        'title_en',
        'title_ru',
        'title_tk',
        'text_en',
        'text_ru',
        'text_tk',
        'position',
        'is_active'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];
}
