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
    public function groups(){
        return $this->hasMany(Group::class, 'subject_id', 'id');
    }
}
