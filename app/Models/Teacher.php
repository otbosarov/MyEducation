<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_name',
        'gender',
        'phone',
        'active',
    ];
    public function subjects(){
        return $this->hasMany(Subject::class);  // teacher and subject   relation (many-to-many)
    }
    public function groups(){
        return $this->hasMany(Group::class);   // teacher and groups   relation (one-to-many)
    }
}
