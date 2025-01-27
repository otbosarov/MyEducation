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
        //shu yerda belongsTo o'rniga  hasOne ishlatsa ham bo'ladimu
        return $this->hasOne(Teacher::class);  // teacher and groups   relation (one-to-one)
    }
    public function subjects(){
        return $this->hasMany(Subject::class);  // subject and groups   relation (one-to-many)
    }
    public function studentToGroup(){
        return $this->hasMany(GroupToStudent::class,'group_id', 'id')
        ->select('group_id', 'student_id', 'active');
    }
}
