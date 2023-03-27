<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'resume_id',
    ];

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function getIssueDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    public function getExpirationDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }

    
}
