<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionSeeder extends Seeder
{
    public function run()
    {
        Question::create([
            'question' => 'Apa yang Anda lakukan ketika menghadapi masalah yang besar?',
            'option_a' => 'Menunggu masalah itu hilang dengan sendirinya',
            'option_b' => 'Menghadapinya dengan berani dan mencari solusi secepat mungkin',
            'option_c' => 'Menghindar dan menunda menyelesaikannya',
            'option_d' => 'Mencari bantuan dari orang lain sebelum mengambil keputusan',
            'correct_answer' => 'B',
        ]);

        Question::create([
            'question' => 'Seberapa sering Anda merasa cemas atau khawatir tentang masa depan?',
            'option_a' => 'Sering',
            'option_b' => 'Kadang-kadang',
            'option_c' => 'Jarang',
            'option_d' => 'Tidak pernah',
            'correct_answer' => 'A',
        ]);

        Question::create([
            'question' => 'Bagaimana Anda menggambarkan diri Anda dalam kelompok sosial?',
            'option_a' => 'Saya lebih suka menjadi pendengar dan jarang berbicara',
            'option_b' => 'Saya merasa nyaman berbicara dengan orang asing',
            'option_c' => 'Saya lebih suka menghindari interaksi dengan orang baru',
            'option_d' => 'Saya merasa canggung dan sulit bergaul',
            'correct_answer' => 'B',
        ]);

        // Tambahkan soal lainnya sesuai kebutuhan
    }
}
