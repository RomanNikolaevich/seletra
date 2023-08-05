<?php

namespace Database\Seeders;

use App\Models\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courseTypes = [
            [
                'name_en' => 'Basic',
                'name_ua' => 'Базовий',
                'description_en' => 'Default course type',
                'description_ua' => 'Тип курсу за замовчуванням',
            ],
            [
                'name_en' => 'Online courses',
                'name_ua' => 'Онлайн-курси',
                'description_en' => 'Courses provided online, often in the form of video lectures, assignments,
                 and self-paced tasks.',
                'description_ua' => 'Курси, які надаються в Інтернеті, часто у формі відеолекцій, завдань та завдань
                 самостійної роботи.',
            ],
            [
                'name_en' => 'Webinars',
                'name_ua' => 'Вебінари',
                'description_en' => 'Interactive online seminars where a lecturer delivers a presentation or lecture
                 in real-time and interacts with participants. They can be free or paid.',
                'description_ua' => 'Інтерактивні онлайн-семінари, де лектор проводить презентацію або лекцію в режимі
                 реального часу та взаємодіє з учасниками. Вони можуть бути безкоштовними або платними.',
            ],
            [
                'name_en' => 'Mobile applications',
                'name_ua' => 'Мобільні додатки',
                'description_en' => 'Educational applications available on mobile devices that allow learning
                 new skills and acquiring knowledge anywhere, anytime.',
                'description_ua' => 'Освітні додатки, доступні на мобільних пристроях, які дозволяють здобувати
                 нові навички та знання в будь-якому місці та в будь-який час.',
            ],
            [
                'name_en' => 'Podcasts',
                'name_ua' => 'Подкасти',
                'description_en' => 'Audio series or episodes where experts or teachers share knowledge and experience.
                 They can be free or paid.',
                'description_ua' => 'Аудіо-серії або епізоди, в яких експерти або викладачі діляться знаннями
                 та досвідом. Вони можуть бути безкоштовними або платними.',
            ],
            [
                'name_en' => 'Video tutorials',
                'name_ua' => 'Відео-уроки',
                'description_en' => 'Instructional videos available online that allow learning a specific
                 topic or skill.',
                'description_ua' => 'Навчальні відеоролики, доступні в Інтернеті, які дозволяють вивчати
                 певну тему або навичку.',
            ],
            [
                'name_en' => 'Books and electronic resources',
                'name_ua' => 'Книги та електронні ресурси',
                'description_en' => 'Textbooks, e-books, articles, and other written materials that can be used
                 for self-paced learning.',
                'description_ua' => 'Підручники, електронні книги, статті та інші письмові матеріали, які можна
                 використовувати для самостійного навчання.',
            ],
            [
                'name_en' => 'Open universities and courses',
                'name_ua' => 'Відкриті університети та курси',
                'description_en' => 'Universities and educational institutions providing free or subscription-based
                 online courses and lectures.',
                'description_ua' => 'Університети та освітні установи, що надають безкоштовні або підписний доступ
                 до онлайн-курсів та лекцій.',
            ],
            [
                'name_en' => 'Tutorials and guides',
                'name_ua' => 'Самоучителі та посібники',
                'description_en' => 'Guides, instructions, and self-paced tutorials providing step-by-step
                 information and tasks for learning specific skills or disciplines.',
                'description_ua' => 'Посібники, інструкції та самоучителі, що надають інформацію та завдання
                 крок за кроком для вивчення певних навичок або дисциплін.',
            ],
            [
                'name_en' => 'Mentoring and online coaching',
                'name_ua' => 'Менторство та онлайн-коучинг',
                'description_en' => 'Individualized learning where an experienced teacher or expert works with
                 a student online, helping develop specific skills and knowledge.',
                'description_ua' => 'Індивідуальне навчання, коли досвідчений викладач або експерт працює зі
                 студентом онлайн, допомагаючи розвивати певні навички та знання.',
            ],
            [
                'name_en' => 'Social networks and forums',
                'name_ua' => 'Соціальні мережі та форуми',
                'description_en' => 'Social platforms and forums where people can share knowledgeand find answers.',
                'description_ua' => 'Соціальні платформи та форуми, де люди можуть обмінюватися знаннями, задавати
                 питання та знаходити відповіді.',
            ],
            [
                'name_en' => 'Group projects and collaborative learning',
                'name_ua' => 'Групові проекти та спільне навчання',
                'description_en' => 'Participation in group projects or collaborative learning with others,
                 where ideas can be exchanged, problems solved, and learning happens in a collective environment.',
                'description_ua' => 'Участь у групових проектах або спільне навчання з іншими людьми, де можна
                 обмінюватися ідеями, вирішувати проблеми та навчатися в колективному середовищі.',
            ],
            [
                'name_en' => 'Self-study and practice',
                'name_ua' => 'Самостійне навчання та практика',
                'description_en' => 'Individual study of materials, conducting research, and practical application
                 of acquired knowledge in real-life situations.',
                'description_ua' => 'Індивідуальне вивчення матеріалів, проведення досліджень та практичне застосування
                 отриманих знань у реальних умовах.',
            ],
            [
                'name_en' => 'Sports',
                'name_ua' => 'Спорт',
                'description_en' => 'Training and sports activities.',
                'description_ua' => 'Тренування та заняття спортом.',
            ],
            [
                'name_en' => 'Television',
                'name_ua' => 'Телевізор',
                'description_en' => 'Television programs and broadcasts related to education.',
                'description_ua' => 'Телевізійні програми та передачі, пов\'язані з освітою.',
            ],
            [
                'name_en' => 'Custom',
                'name_ua' => 'Свій варіант',
                'description_en' => 'Custom course type or additional options not covered by the predefined types.',
                'description_ua' => 'Власний тип курсу або додаткові варіанти, які не входять до попередньо визначених
                 типів.',
            ],
        ];

        foreach ($courseTypes as $courseType) {
            CourseType::create($courseType);
        }
    }
}
