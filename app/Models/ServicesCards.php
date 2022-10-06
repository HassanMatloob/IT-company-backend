<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesCards extends Model
{
    use HasFactory;

    protected $table = 'services_cards';

    protected $fillable = [
        'icon',
        'title',
        'short_description',
        'details',
        'setting_id',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }
}
