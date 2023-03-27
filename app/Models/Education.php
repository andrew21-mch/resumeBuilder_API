<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'school',
        'degree',
        'field_of_study',
        'start_date',
        'end_date',
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

    public function getEndDateAttribute($value)
    {
        return date('Y-m-d', strtotime($value));
    }
}
