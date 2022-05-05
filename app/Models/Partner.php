<?php

namespace App\Models;

use App\Traits\ModelMediaAttribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    use HasFactory;
    use ModelMediaAttribute;

    /**
     * @var string[] $filleble
     */
    protected $fillable = [
        'title_en',
        'title_ru',
        'title_tk',

        'extension',
        'media',

        'link',
        'position',
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
