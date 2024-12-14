<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // Menampilkan daftar soal
    public function index()
    {
        $questions = Question::all();  // Ambil semua soal dari database
        return view('questions.index', compact('questions')); // Kirim data ke view
    }

    // Menyimpan jawaban pengguna dan menampilkan hasil
    public function store(Request $request)
    { 
        \Log::info('Jawaban yang dikirimkan:', $request->all());
        // Ambil semua data jawaban yang dikirimkan
        $answers = $request->input('question'); // 'question' adalah array dari jawaban yang dikirim
        $correctAnswersCount = 0;
        $results = []; // Array untuk menyimpan jawaban dan statusnya
    
        // Proses setiap soal dan jawabannya
        foreach ($answers as $questionId => $answer) {
            $question = Question::find($questionId); // Cari soal berdasarkan ID
    
            if ($question) {
                // Bandingkan jawaban yang diberikan dengan jawaban yang benar
                $isCorrect = ($question->correct_answer == $answer);
                if ($isCorrect) {
                    $correctAnswersCount++;
                }
    
                // Simpan hasil jawaban dalam array
                $results[] = [
                    'question' => $question->question,
                    'user_answer' => $answer,
                    'correct_answer' => $question->correct_answer,
                    'is_correct' => $isCorrect
                ];
            }
        }
        \Log::info('Hasil yang dikirimkan ke view:', $results);
        // Kirim data hasil ke view
        return view('questions.result', [
            'correctAnswersCount' => $correctAnswersCount,
            'results' => $results
        ]);
    }
}    