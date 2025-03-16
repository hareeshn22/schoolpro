<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $feedbacks = [
            [
                'app_name' => 'SchoolPro',
                'content'  => " Usability The app's interface is intuitive, but the navigation could be smoother for first-time users.",
            ],
            [
                'app_name' => 'SchoolPro',
                'content'  => "The instructional videos are very helpful, though more tutorials for advanced users would be nice.",
            ],
        ];

        foreach ($feedbacks as $exam) {
            \App\Models\Feedback::create($exam);
        }

    }
}
