<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Jawaban Anda</title>
    <a href="{{ url('/questions') }}" class="btn btn-primary">
    <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
</a>

</head>
<body>
    <h1>Hasil Jawaban Anda</h1>

    <p>Total Jawaban Benar: {{ $correctAnswersCount }} dari {{ count($results) }} soal.</p>

    <h2>Detail Jawaban:</h2>
    <ul>
        @foreach($results as $result)
            <li>
                <strong>{{ $result['question'] }}</strong><br>
                Jawaban Anda: {{ $result['user_answer'] }}<br>
                Jawaban Benar: {{ $result['correct_answer'] }}<br>
                Status: 
                @if ($result['is_correct'])
                    <span style="color: green;">Benar</span>
                @else
                    <span style="color: red;">Salah</span>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
