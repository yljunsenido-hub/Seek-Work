<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_id', 
        'user_id', 
        'status'
    ];

    // The person who applied
    public function applicant()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // The job they applied for
    public function job()
    {
        return $this->belongsTo(Workjob::class, 'job_id');
    }
}
