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
    public function teachers()
    {

        return $this->hasOne(Teacher::class);
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }
    public function studentToGroup()
    {
        return $this->hasMany(GroupToStudent::class, 'group_id', 'id')
            ->select('group_id', 'student_id', 'active');
    }
}
