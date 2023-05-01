<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'organization',
        'issue_date',
        'expiration_date',
        'description',
        'resume_id',
        'user_id',
        'url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

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
