<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courses extends Model
{
    use HasFactory;
    protected $fillable = [
        'courseName',
        // 'student_id'
    ];

    public function users()
    {
        return $this->belongsToMany(Student::class, 'student_course');
    }
}
