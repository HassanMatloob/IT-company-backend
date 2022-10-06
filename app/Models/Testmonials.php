<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testmonials extends Model
{
    use HasFactory;

    protected $table = 'testmonials';

    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'review',
        'reviewer_name',
        'status',
        'setting_id',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }
}
