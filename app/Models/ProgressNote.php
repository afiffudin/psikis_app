<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgressNote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'date', 'note'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}