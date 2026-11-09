<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[fillable('name')]
class Major extends Model
{
    use HasFactory;


    public function students()
    {
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}