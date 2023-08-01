<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'nis',
        'gender',
        'class_id',
    ];

    public function class()
    {
        return $this->belongsTo(ClassRoom::class);
    }

    public function extracurriculers()
    {
        return $this->belongsToMany(Extracurriculer::class, 'student_extracurriculer', 'student_id', 'extracurriculer_id');
    }
}
