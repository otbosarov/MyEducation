<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'gender',
        'phone',
        'rating',
        'active',
    ];

    public function groupToStudent()
    {
        return $this->hasOne(GroupToStudent::class, 'student_id', 'id');
    }
    public function groups()
    {
        return $this->hasMany(Group::class);
    }
}
