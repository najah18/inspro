<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;


class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $employees = [
            [
                'name' => 'bahaa',
                'description' => 'Lebanese director Baha Al-Rizz owns "InsproProduction" and "Frame Line" in the UAE. With a degree in directing and a passion for creativity, he has cemented his position in the film and production industry through innovation, entrepreneurship, and professionalism.',
                'photo' => 'images/bahaa.png',
            ],
            [
                'name' => 'karol',
                'description' => ' a Bachelors degree in Advertising and Marketing, I specialize in content creation and analyzing social media trends. My focus is on understanding digital market dynamics and delivering innovative insights to enhance effective communication in the digital age.',
                'photo' => 'images/karol.png',
            ],
            [
                'name' => 'ibrahim',
                'description' => 'Ibrahim, a Lebanese creative born in 1992, holds degrees in Business Administration and Cinematic Directing. Renowned for his short cinematic series and music videos for Arab artists, he has earned international acclaim. Ibrahim blends imagination and reality to create impactful artistic work that resonates across generations.',
                'photo' => 'images/ibrahim.png',
            ],
        ];

        foreach ($employees as $employee) {
            Employee::create($employee);
        }
    }
}
