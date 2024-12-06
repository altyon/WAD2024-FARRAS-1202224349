<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $table = 'lecturer';

    protected $fillable = [
        'lecturer_code',
        'lecturer_name',
        'nip',
        'email',
        'telephone_number',
    ];

    public function students()
    {
        return $this->hasMany(Student::class, 'dosen_id');
    }


    //
}
