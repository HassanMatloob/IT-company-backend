<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_company_logo')->nullable();
            $table->string('hero_section_title')->nullable();
            $table->string('hero_section_sub_title')->nullable();
            $table->string('hero_section_bg_image')->nullable();
            $table->string('services_title')->nullable();
            $table->string('services_description')->nullable();
            $table->string('teravision_title')->nullable();
            $table->string('teravision_sub_title')->nullable();
            $table->string('teravision_description')->nullable();
            $table->string('teravision_image')->nullable();
            $table->string('aboutus_title')->nullable();
            $table->longText('aboutus_details')->nullable();
            $table->string('contact_section_title')->nullable();
            $table->string('contact_section_description')->nullable();
            $table->string('location')->nullable();
            $table->string('email')->nullable();
            $table->string('call')->nullable();
            $table->string('map')->nullable();
            $table->string('footer_company_logo')->nullable();
            $table->string('footer_useful_links_title')->nullable();
            $table->string('footer_our_services_title')->nullable();
            $table->string('social_networks_title')->nullable();
            $table->string('social_networks_description')->nullable();
            $table->string('fb_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('insta_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->string('copyright_text')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
