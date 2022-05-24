<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->call(SliderSeeder::class);
        $this->call(SliderBlockSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(PhoneSeeder::class);
        $this->call(SocialSeeder::class);
        $this->call(EmailSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(ContactSeeder::class);
        $this->call(BlogCategorySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(UserSocialSeeder::class);
        $this->call(AboutStepSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(StepSeeder::class);
    }
}
