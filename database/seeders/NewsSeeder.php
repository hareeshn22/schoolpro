<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $videos = [
            [
                'school_id'  => 1,
                "category"   => "teachersdesk",
                "title"      => "పాఠశాలల విద్యాసంస్కరణ లు విధాన ప్రణాళిక 2024",
                "video_link" => "X5yvsumisRM",
            ],
            [
                'school_id'  => 1,
                "category"   => "school",
                "title"      => "Saraswati School Activity 2024",
                "video_link" => "5LTWkLhCPa8",
            ],
            [
                'school_id'  => 1,
                "category"   => "teachersdesk",
                "title"      => "SchoolPro closely monitors the trends and changes in the education system. - SchoolPro Team",
                "video_link" => "X5yvsumisRM",

            ],
            [
                'school_id'  => 1,
                "category"   => "school",
                "title"      => "Saraswati School Program and Anniversary Day Function  Activity",
                "video_link" => "5LTWkLhCPa8",
            ],

        ];

        foreach ($videos as $video) {
            \App\Models\News::create($video);
        }

    }
}
