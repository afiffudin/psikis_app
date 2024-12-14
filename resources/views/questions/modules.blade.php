@extends('questions.dashboard')

@section('title', 'Modules')

@section('content')
<div class="table-container">
    <h4 class="mb-4">Daftar Soal Psikologi Mandiri</h4>

    <div class="mb-4">
        <strong>Apa yang Anda lakukan ketika menghadapi masalah yang besar?</strong>
        <div>
            <input type="radio" name="q1" id="q1a" value="A">
            <label for="q1a">A. Menunggu masalah itu hilang dengan sendirinya</label>
        </div>
        <div>
            <input type="radio" name="q1" id="q1b" value="B">
            <label for="q1b">B. Menghadapinya dengan berani dan mencari solusi secepat mungkin</label>
        </div>
        <div>
            <input type="radio" name="q1" id="q1c" value="C">
            <label for="q1c">C. Menghindar dan menunda menyelesaikannya</label>
        </div>
        <div>
            <input type="radio" name="q1" id="q1d" value="D">
            <label for="q1d">D. Mencari bantuan dari orang lain sebelum mengambil keputusan</label>
        </div>
    </div>

    <div class="mb-4">
        <strong>Seberapa sering Anda merasa cemas atau khawatir tentang masa depan?</strong>
        <div>
            <input type="radio" name="q2" id="q2a" value="A">
            <label for="q2a">A. Sering</label>
        </div>
        <div>
            <input type="radio" name="q2" id="q2b" value="B">
            <label for="q2b">B. Kadang-kadang</label>
        </div>
        <div>
            <input type="radio" name="q2" id="q2c" value="C">
            <label for="q2c">C. Jarang</label>
        </div>
        <div>
            <input type="radio" name="q2" id="q2d" value="D">
            <label for="q2d">D. Tidak pernah</label>
        </div>
    </div>

    <button class="btn btn-primary mt-3">Submit</button>
</div>
@endsection
