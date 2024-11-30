<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('question'); // Kolom untuk soal
            $table->string('option_a'); // Pilihan A
            $table->string('option_b'); // Pilihan B
            $table->string('option_c'); // Pilihan C
            $table->string('option_d'); // Pilihan D
            $table->char('correct_answer', 1); // Kolom untuk jawaban yang benar (A, B, C, atau D)
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
