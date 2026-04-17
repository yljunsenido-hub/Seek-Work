<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Companies;

class Photo extends Model
{
    protected $fillable = [
        'company_id',
        'path',
    ];

    public function companies()
    {
        // A photo belongs to a single company
        return $this->belongsTo(Companies::class);
    }
}
