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
    public function teachers(){
        return $this->hasMany(Teacher::class);  // teacher and subject   relation (many-to-many)
    }
    public function groups(){
        //shu yerda belongsTo o'rniga  hasOne ishlatsa ham bo'ladimu
        return $this->hasOne(Group::class);   // group and subject   relation (one-to-many)
    }
}
