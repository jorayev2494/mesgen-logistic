<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * @var array<int, string> $fillable
     */
    protected $fillable = [
        'media',
        'title',
        'text',
        'is_active',
        'position',
    ];

    protected $casts = [
        'position' => 'integer',
        'is_active' => 'bool',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];
}
