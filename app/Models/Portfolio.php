<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $table = 'portfolios';

    protected $fillable = [
        'project_title',
        'project_desc',
        'project_iamge',
        'setting_id',
        'status',
    ];

    public function setting()
    {
        return $this->belongsTo(Settings::class,'id');
    }

    public function portfolioTechTags()
    {
        return $this->hasMany(PortfolioTechTag::class,'portfolio_id');
    }

}
