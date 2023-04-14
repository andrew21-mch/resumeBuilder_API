<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'summary',
        'email',
        'phone',
        'website',
        'address',
        'city',
        'region',
        'country',
        'postal_code',
        'github',
        'linkedin',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'gender',
        'date_of_birth'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProfileSocialsAttribute()
    {
        return [
            'github' => $this->github,
            'linkedin' => $this->linkedin,
            'twitter' => $this->twitter,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'youtube' => $this->youtube,
        ];
    }

    public function getProfileAddressAttribute()
    {
        return [
            'address' => $this->address,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
            'postal_code' => $this->postal_code,
        ];
    }

    public function getProfileContactAttribute()
    {
        return [
            'email' => $this->email,
            'phone' => $this->phone,
            'website' => $this->website,
        ];
    }

    public function getProfileSummaryAttribute()
    {
        return $this->summary;
    }

}
