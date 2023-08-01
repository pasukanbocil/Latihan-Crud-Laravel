<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extracurriculer extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_extracurriculer', 'extracurriculer_id', 'student_id');
    }
}
