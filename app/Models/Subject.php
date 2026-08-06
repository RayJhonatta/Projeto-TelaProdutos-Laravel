<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id',
        'title',
        'description',
        'icon',
        'color',
    ];

    public function user()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function tasks() {
        return $this->hasMany(Task::class);
    }
}
