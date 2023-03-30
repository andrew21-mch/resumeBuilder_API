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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function getStartDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }


}
