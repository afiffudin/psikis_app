<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password'];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function progressNotes()
    {
        return $this->hasMany(ProgressNote::class);
    }

    public function quizResults()
    {
        return $this->hasMany(QuizResult::class);
    }
}
