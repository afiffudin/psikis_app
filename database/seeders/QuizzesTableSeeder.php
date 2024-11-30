<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'title' => 'Stress Assessment',
            'description' => 'Measure your current stress levels.'
        ]);

        Quiz::create([
            'title' => 'Focus Ability Test',
            'description' => 'Evaluate your ability to maintain focus on tasks.'
        ]);
    }
}
