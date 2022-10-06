<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;

    protected $table = 'careers';

    protected $fillable = [
        'job_title',
        'job_desc',
        'job_iamge',
        'setting_id',
        'status',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }

    public function careerTechTags()
    {
        return $this->hasMany(CareerTechTag::class,'career_id');
    }

}
