<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected  $fillable = [
        'subject_name',
        'active',
    ];
    public function teachers()
    {
        return $this->hasMany(Teacher::class);
    }
    public function groups()
    {
        return $this->hasOne(Group::class);
    }
}
