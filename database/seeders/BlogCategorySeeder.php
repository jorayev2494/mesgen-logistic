<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{

    /**
     * @var array $testCategoryTitles
     */
    private array $testCategoryTitles = [
        'Eko',
        'H2O',
        'php',
        'js',
        'python',
        'Laravel',
        'Vue.js',
        'React.js'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = User::get('id');

        foreach ($this->testCategoryTitles as $title) {
            BlogCategory::factory()->create([
                'title_en' => $title,
                'title_ru' => $title,
                'title_tk' => $title,
                'user_id' => $users->random(1)->first->id
            ]);
        }
    }
}
