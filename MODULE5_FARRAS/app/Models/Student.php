<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'student';

    protected $fillable = [
        'nim',
        'student_name',
        'email',
        'major',
        'dosen_id',
    //
    ];

    public function lecturer()
    {
        return $this->belongsTo(Lecturer::class, 'dosen_id');
    }
}
