<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\WorkHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkHourSeeder extends Seeder
{

    /**
     * @var array $defaultWorkHours
     */
    private array $defaultWorkHours = [
        'en' => [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday',
        ],
        'ru' => [
            'Понедельник',
            'Вторник',
            'Среда',
            'Четверг',
            'Пятница',
            'Суббота',
            'Воскресенье',
        ],
        'tk' => [
            'Duşenbe',
            'Sişenbe',
            'Çarşenbe',
            'Penşenbe',
            'Juma',
            'Şenbe',
            'Sundayekşenbe',
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach (Country::all() as $country) {
            for ($i = 0; $i < count($this->defaultWorkHours['en']); $i++) {
                WorkHour::factory()->create([
                    'title_en' => $this->defaultWorkHours['en'][$i],
                    'title_ru' => $this->defaultWorkHours['ru'][$i],
                    'title_tk' => $this->defaultWorkHours['tk'][$i],
                    'country_id' => $country->id
                ]);
            }
        }
    }
}
