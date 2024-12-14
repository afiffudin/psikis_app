<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Psikologi Mandiri</title>
</head>
<body>
    <h1>Daftar Soal Psikologi Mandiri</h1>

    <form action="{{ route('questions.questionstore') }}" method="POST">
   ` @csrf
    @foreach($questions as $question)`
        <div>
            <p><strong>{{ $question->question }}</strong></p>
            <label>
                <input type="radio" name="question[{{ $question->id }}]" value="A">
                A. {{ $question->option_a }}
            </label><br>
            <label>
                <input type="radio" name="question[{{ $question->id }}]" value="B">
                B. {{ $question->option_b }}
            </label><br>
            <label>
                <input type="radio" name="question[{{ $question->id }}]" value="C">
                C. {{ $question->option_c }}
            </label><br>
            <label>
                <input type="radio" name="question[{{ $question->id }}]" value="D">
                D. {{ $question->option_d }}
            </label>
        </div>
        <hr>
    @endforeach

    <button type="submit">Simpan Jawaban</button>
</form>
