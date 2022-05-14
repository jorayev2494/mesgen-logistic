<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    /**
     * @var array fillable
     */
    protected $fillable = [
        'value',
        'user_id',
        'is_active'
    ];

    /**
     * @var string[] $casts
     */
    protected $casts = [
        'is_active' => 'bool',
        'created_at' => 'datetime:d-m-Y H:i:s',
        'updated_at' => 'datetime:d-m-Y H:i:s',
    ];

    /**
     * @return BelongsToMany
     */
    public function blogs(): BelongsToMany
    {
        return $this->belongsToMany(Blog::class, 'blog_tags', 'tag_id', 'blog_id'); // ->using(BlogTag::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // /**
    //  * @return Attribute
    //  */
    // public function value(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value): string => "#{$value}",
    //         set: fn (string $value): string => $value
    //     );
    // }
}
