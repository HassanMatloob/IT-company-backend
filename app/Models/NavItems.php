<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavItems extends Model
{
    use HasFactory;

    protected $table = 'nav_items';

    protected $fillable = [
        'item_name',
        'section_id',
        'item_link',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }
}
