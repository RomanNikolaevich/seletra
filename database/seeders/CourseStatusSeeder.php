<?php

namespace Database\Seeders;

use App\Models\CourseStatus;
use Illuminate\Database\Seeder;

class CourseStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name_en' => 'new',
                'name_ua' => 'новий',
            ],
            [
                'name_en' => 'active',
                'name_ua' => 'активний',
            ],
            [
                'name_en' => 'scheduled',
                'name_ua' => 'запланований',
            ],
            [
                'name_en' => 'paused',
                'name_ua' => 'призупинений',
            ],
            [
                'name_en' => 'completed',
                'name_ua' => 'завершений',
            ],
            [
                'name_en' => 'deleted',
                'name_ua' => 'видалений',
            ],
        ];

        foreach ($statuses as $status) {
            CourseStatus::create($status);
        }
    }
}
