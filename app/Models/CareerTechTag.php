<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerTechTag extends Model
{
    use HasFactory;

    protected $table = 'career_tech_tags';

    protected $fillable = [
        'tag',
        'career_id',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class,'id');
    }
}
