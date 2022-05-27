<?php

namespace Database\Seeders;

use App\Models\TextTranslate;
use Illuminate\Database\Seeder;

class TextTranslateSeeder extends Seeder
{

    /**
     * @var array $defaultTextTranslateSlugs
     */
    public const DEFAULT_TEXT_TRANSLATE_SLUGS = [
        'test',
        'service-title'
    ];

    /**
     * @return void
     */
    public function run(): void
    {
        foreach (self::DEFAULT_TEXT_TRANSLATE_SLUGS as $key => $slug) {
            TextTranslate::factory()->create(compact('slug'));
        }
    }
}
