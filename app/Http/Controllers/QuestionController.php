<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.dashboard', compact('questions'));
    }
    public function tampil()
    {
        $questions = Question::all();  // Ambil semua soal dari database
        return view('questions.soal', compact('questions')); // Kirim data ke view
    }

    public function questionstore(Request $request)
    {  
        // dd($request->all());
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
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Question::create($request->all());

        return redirect()->route('questions.index')->with('success', 'Question added successfully!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $question = Question::findOrFail($id); // Ambil question berdasarkan ID
        $question->delete();
        return redirect()->route('questions.index')->with('success', 'Question deleted successfully!');

    }
}
