<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

#[Table('classes')]
#[fillable('name')]
class SchoolClass extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public function students()
    {
        // relasi students kamu
    }
}