<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    use HasFactory;

    protected $table = 'settings';

    protected $fillable = [
        'header_company_logo',
        'hero_section_title',
        'hero_section_sub_title',
        'hero_section_bg_image',
        'services_title',
        'services_description',
        'teravision_title',
        'teravision_sub_title',
        'teravision_description',
        'teravision_image',
        'aboutus_title',
        'aboutus_details',
        'contact_section_title',
        'contact_section_description',
        'location',
        'email',
        'map',
        'footer_company_logo',
        'footer_useful_links_title',
        'footer_our_services_title',
        'social_networks_title',
        'social_networks_description',
        'fb_link',
        'twitter_link',
        'insta_link',
        'skype_link',
        'linkedin_link',
        'copyright_text',
    ];

    public function navItems()
    {
        return $this->hasMany(NavItems::class,'setting_id');
    }

    public function servicesCards()
    {
        return $this->hasMany(ServicesCards::class,'setting_id');
    }

    public function teravisionNodes()
    {
        return $this->hasMany(TeravisionNode::class,'setting_id');
    }

    public function testmonials()
    {
        return $this->hasMany(Testmonials::class,'setting_id');
    }

    public function usefulLinks()
    {
        return $this->hasMany(UsefulLinks::class,'setting_id');
    }

    public function ourServicesLinks()
    {
        return $this->hasMany(OurServicesLinks::class,'setting_id');
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class,'setting_id');
    }

    public function careers()
    {
        return $this->hasMany(Career::class,'setting_id');
    }
}
