<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Student extends Model
{
    use HasFactory , softDeletes;
    protected $fillable = [
        'studentName',
        'age',
        // 'course_id',
    ];

    public function courses()
    {
        return $this->belongsToMany(courses::class, 'student_course');
    }

}
