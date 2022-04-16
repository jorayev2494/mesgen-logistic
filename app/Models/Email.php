<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'email',
        'position',
        'is_active',
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
}
