<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $primaryKey = 'lesson_id'; // Specify the primary key
    protected $fillable = [
        'lesson_name',
        'course_id',
        'image_path',
        'content',
        'created_by',
    ];

    // Define the relationship with the Course model
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'course_id');
    }

    // Other methods or relationships can be defined here
}
