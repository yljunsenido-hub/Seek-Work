<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $fillable = [
        'user_id', 
        'name', 
        'tagline',
        'description',
        'banner_path',
        'logo_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobs()
    {
        return $this->hasMany(Workjob::class, 'company_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class, 'company_id');
    }
}
