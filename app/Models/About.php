<?php

namespace App\Models;

use App\Traits\ModelMediaAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    use ModelMediaAttribute;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'title_en',
        'title_ru',
        'title_tk',

        'text_en',
        'text_ru',
        'text_tk',

        'extension',
        'media',
        'is_active',
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
