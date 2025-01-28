<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_name',
        'subject_id',
        'teacher_id',
        'active',
    ];
    public function studentToGroup()
    {
        return $this->hasMany(GroupToStudent::class, 'group_id', 'id')
            ->select('group_id', 'student_id', 'active');
    }
    public function subjects(){
        return $this->hasOne(Subject::class);
    }
    public function teacherGroup(){
        return $this->hasMany(Teacher::class, 'id', 'teacher_id');
    }
}
