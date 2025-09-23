<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'contact',
        'whatsapp',
        'city',
        'state',
        'location',
        'pincode',
        'about',
        'slogan',
        'company_image',
        'logo',
        'favicon',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'company_image' => 'array',
        'logo'          => 'array',
        'favicon'       => 'array',
        'latitude'      => 'float',
        'longitude'     => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
