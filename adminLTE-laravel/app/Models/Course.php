<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $primaryKey = 'course_id';

    protected $fillable = [
        'course_name', 'description', 'created_by'
    ];

    // Relationship to User model (created_by)
    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'created_by', 'user_id');
    }
}
