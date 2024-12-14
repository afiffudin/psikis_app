@extends('questions.dashboard')

@section('title', 'Modules')

@section('content')
<form id="soalForm" action="{{ route('questions.questionstore') }}" method="POST">
    @csrf
    <div class="table-container">
        <h4 class="mb-4">Daftar Soal Psikologi Mandiri</h4>

        @foreach($questions as $question)
        <div class="mb-4">
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
        @endforeach

        <div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </div>

        <!-- Notifikasi -->
        <div id="alertBox" class="alert alert-danger mt-3" style="display: none;">
            Harap jawab semua soal sebelum submit!
        </div>
    </div>
</form>

<script>
    document.getElementById('soalForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah submit form bawaan

        let alertBox = document.getElementById('alertBox');
        let allAnswered = true; // Flag untuk memeriksa semua jawaban

        // Ambil semua input radio berdasarkan nama yang dimulai dengan "question"
        const questions = document.querySelectorAll('input[type="radio"]');
        const questionIds = [...new Set(Array.from(questions).map(input => input.name))];

        // Periksa setiap pertanyaan apakah sudah dijawab
        for (let questionId of questionIds) {
            let answered = document.querySelector(`input[name="${questionId}"]:checked`);
            if (!answered) {
                allAnswered = false;
                break;
            }
        }

        if (!allAnswered) {
            alertBox.style.display = 'block'; // Tampilkan notifikasi
        } else {
            alertBox.style.display = 'none';  // Sembunyikan notifikasi jika semua dijawab
            // Submit form secara manual
            document.getElementById('soalForm').submit();
        }
    });
</script>
@endsection
