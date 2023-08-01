<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'class';

    protected $fillable = [
        'name',
        'teacher_id',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id', 'id');
    }

    public function walikelas()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
