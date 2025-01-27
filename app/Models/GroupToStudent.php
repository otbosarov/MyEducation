<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupToStudent extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_id',
        'student_id',
        'active',
    ];

    public function lesson(){
        return $this->hasOne(Lesson::class, 'id', 'group_id')
        ->where('lessons.id', request('lesson_id'));
    }

    public function students(){
        return $this->hasOne(Student::class, 'id', 'student_id');
    }
}
