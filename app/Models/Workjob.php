<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workjob extends Model
{
    protected $fillable = [
        'company_id', 
        'title', 
        'description',
        'salary',
        'location',
        'status',
    ];

    public function Companies(){
        return $this->belongsTo(Companies::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}
