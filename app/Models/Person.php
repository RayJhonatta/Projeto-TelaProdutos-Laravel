<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class Person extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'person';

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function subjects()
    {
        return $this->hasMany(Subject::class, 'person_id');
    }

    public function calendar()
    {
        return $this->hasMany(Calendar::class, 'person_id');
    }
}