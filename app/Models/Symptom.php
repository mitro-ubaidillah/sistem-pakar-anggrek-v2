<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function disease()
    {
        return $this->belongsTo(Disease::class, 'disease_id');
    }
    public function cf()
    {
        return $this->belongsTo(cfUser::class, 'cf_role');
    }
}
