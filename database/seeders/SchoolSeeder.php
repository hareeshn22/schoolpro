<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $schools = [
            [
                'name' => 'Saraswati High School',
                'logo' => 'saraswati-school.jpg',
                'descr' => 'Saraswati High School provides a vibrant learning environment with a focus on holistic education and character development.',
                'phone' => '9000123456',
                'address' => '5678 Oak Avenue, Vizianagaram, Andhra Pradesh, 535002',
                'pcolor' => '#0C46C4',
                'scolor' => '#7CA8FF'
            ],
            [
                'name' => 'Green Valley School',
                'logo' => 'saraswati-school.jpg',
                'descr' => 'Green Valley School is known for its excellent academic record and a wide range of extracurricular activities that nurture talents.',
                'phone' => '9000012345',
                'address' => '1234 Elm Street, Vizianagaram, Andhra Pradesh, 535001',
                'pcolor' => '#2E8B57',
                'scolor' => '#A9DDA5'
            ],
            [
                'name' => 'Sunshine High School',
                'logo' => 'sunshine-school-logo.png',
                'descr' => 'An international school with world-class facilities.',
                'phone' => '9234567801',
                'address' => 'ABC Avenue, Vijayawada, Andhra Pradesh',
                'pcolor' => '#FDB813',
                'scolor' => '#FFF1B1'
            ],
            [
                'name' => 'Silver Oak Public School',
                'logo' => 'silveroak_logo.png',
                'descr' => 'A premier institution known for academic excellence.',
                'phone' => '3456789012',
                'address' => 'PQR Road, Guntur, Andhra Pradesh',
                'pcolor' => '#A9A9A9',
                'scolor' => '#D3D3D3'
            ],
            [
                'name' => 'Golden Crest Academy',
                'logo' => 'goldencrest_logo.png',
                'descr' => 'A school with a focus on innovation and creativity.',
                'phone' => '4567890123',
                'address' => 'LMN Lane, Tirupati, Andhra Pradesh',
                'pcolor' => '#FFD700',
                'scolor' => '#FFFACD'
            ],
            [
                'name' => 'Emerald Heights School',
                'logo' => 'emeraldheights_logo.png',
                'descr' => 'Offering a vibrant and inclusive learning environment.',
                'phone' => '5678901234',
                'address' => 'STU Circle, Visakhapatnam, Andhra Pradesh',
                'pcolor' => '#50C878',
                'scolor' => '#B6F0D1'
            ],
            [
                'name' => 'Mountain View School',
                'logo' => 'mountainview_logo.png',
                'descr' => 'Providing quality education with a scenic backdrop.',
                'phone' => '6789012345',
                'address' => 'XYZ Street, Kurnool, Andhra Pradesh',
                'pcolor' => '#1E3D59',
                'scolor' => '#90B2D8'
            ],
            [
                'name' => 'Riverdale School',
                'logo' => 'riverdale_logo.png',
                'descr' => 'A progressive school nurturing young minds.',
                'phone' => '7890123456',
                'address' => 'ABC Avenue, Nellore, Andhra Pradesh',
                'pcolor' => '#4682B4',
                'scolor' => '#ADD8E6'
            ],
            [
                'name' => 'Sunrise International School',
                'logo' => 'sunrise_logo.png',
                'descr' => 'Known for its modern approach to education.',
                'phone' => '8901234567',
                'address' => 'PQR Road, Rajahmundry, Andhra Pradesh',
                'pcolor' => '#FF4500',
                'scolor' => '#FFDAB9'
            ],
            [
                'name' => 'Maple Leaf High School',
                'logo' => 'mapleleaf_logo.png',
                'descr' => 'Emphasizing both academic and extracurricular excellence.',
                'phone' => '9012345678',
                'address' => 'LMN Lane, Ongole, Andhra Pradesh',
                'pcolor' => '#A52A2A',
                'scolor' => '#DEB887'
            ],
            [
                'name' => 'Crystal Springs School',
                'logo' => 'crystalsprings_logo.png',
                'descr' => 'Dedicated to fostering critical thinking and creativity.',
                'phone' => '0123456789',
                'address' => 'STU Circle, Kadapa, Andhra Pradesh',
                'pcolor' => '#00CED1',
                'scolor' => '#E0FFFF'
            ],
        ];


        foreach ($schools as $key => $school) {
            \App\Models\School::create($school);
        }

    }
}
