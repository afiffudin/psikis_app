<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::create([
            'title' => 'Managing Stress',
            'description' => 'This module helps you learn how to manage stress effectively.'
        ]);

        Module::create([
            'title' => 'Improving Focus',
            'description' => 'Techniques for improving your concentration and focus.'
        ]);
    }
}
