<?php

namespace App\Models;

use App\Traits\ModelMediaAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    use ModelMediaAttribute;

    /**
     * @var array<int, string> $fillable
     */
    protected $fillable = [
        'media',
        'title_en',
        'title_ru',
        'title_tk',
        'text_en',
        'text_ru',
        'text_tk',
        'extension',
        'is_active',
        'position',
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'position' => 'integer',
        'is_active' => 'bool',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];
}
