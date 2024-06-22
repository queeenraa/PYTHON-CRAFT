<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

    protected $fillable = [
        'course_id',
        'quiz_name',
        'question',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'correct_answer',
    ];

    protected $casts = [
        'correct_answer' => 'string', // Sesuaikan dengan tipe data yang sesuai, misalnya 'string' atau 'char'
    ];
}
