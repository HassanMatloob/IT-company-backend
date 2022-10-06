<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurServicesLinks extends Model
{
    use HasFactory;

    protected $table = 'our_services_links';

    protected $fillable = [
        'name',
        'link',
        'setting_id',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }
}
