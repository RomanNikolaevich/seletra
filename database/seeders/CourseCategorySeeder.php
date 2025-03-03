<?php

namespace Database\Seeders;

use App\Models\CourseCategory;
use Illuminate\Database\Seeder;

class CourseCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Foreign Languages' => 'Іноземні мови',
            'Programming' => 'Програмування',
            'Design' => 'Дизайн',
            'Mathematics' => 'Математика',
            'Science' => 'Наука',
            'History' => 'Історія',
            'Literature' => 'Література',
            'Arts' => 'Мистецтво',
            'Music' => 'Музика',
            'Sports' => 'Спорт',
            'Health' => 'Здоров\'я',
            'Cooking' => 'Кулінарія',
            'Gardening' => 'Садівництво',
            'Photography' => 'Фотографія',
            'Writing' => 'Письмо',
            'Business' => 'Бізнес',
            'Finance' => 'Фінанси',
            'Marketing' => 'Маркетинг',
            'Psychology' => 'Психологія',
            'Philosophy' => 'Філософія',
            'Self-improvement' => 'Саморозвиток',
            'Technology' => 'Технології',
            'Environment' => 'Довкілля',
            'Travel' => 'Подорожі',
            'Fashion' => 'Мода',
            'Film and TV' => 'Кіно і ТБ',
            'Parenting' => 'Батьківство',
            'Crafts' => 'Рукоділля',
            'DIY' => 'Саморобки',
            'Hobbies' => 'Хобі',
            'Other' => 'Інше',
        ];

        foreach ($categories as $name_en => $name_ua) {
            CourseCategory::create([
                'name_en' => $name_en,
                'name_ua' => $name_ua,
            ]);
        }
    }
}
