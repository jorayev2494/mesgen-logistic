<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BlogTag extends Pivot
{
    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'blog_id',
        'tag_id',
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];
}
