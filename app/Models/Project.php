<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'url',
        'image',
        'github',
        'resume_id',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function getStartDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    
}
