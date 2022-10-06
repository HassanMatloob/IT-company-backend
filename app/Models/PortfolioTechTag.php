<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioTechTag extends Model
{
    use HasFactory;

    protected $table = 'portfolio_tech_tags';

    protected $fillable = [
        'tag',
        'portfolio_id',
    ];

    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class,'id');
    }
}
