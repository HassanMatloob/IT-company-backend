<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeravisionNode extends Model
{
    use HasFactory;

    protected $table = 'teravision_nodes';

    protected $fillable = [
        'title',
        'short_description',
        'setting_id',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }
}
