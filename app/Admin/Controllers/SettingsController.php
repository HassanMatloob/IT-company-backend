<?php

namespace App\Admin\Controllers;

use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Row;
use Encore\Admin\Layout\Column;

class SettingsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Settings';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Settings());

        $grid->column('id', __('Id'));
        $grid->column('header_company_logo', __('Header company logo'))->image();
        $grid->column('hero_section_title', __('Hero section title'));
        $grid->column('hero_section_sub_title', __('Hero section sub title'))->limit(50);
        $grid->column('hero_section_bg_image', __('Hero section bg image'))->image();
        $grid->column('services_title', __('Services title'));
        $grid->column('services_description', __('Services description'))->limit(50 );
        $grid->column('teravision_title', __('Teravision title'));
        $grid->column('teravision_sub_title', __('Teravision sub title'))->limit(50 );
        $grid->column('teravision_description', __('Teravision description'))->limit(50 );
        $grid->column('teravision_image', __('Teravision image'))->image();
        $grid->column('aboutus_title', __('Aboutus title'));
        $grid->column('aboutus_details', __('Aboutus details'))->limit(50 );
        $grid->column('contact_section_title', __('Contact section title'));
        $grid->column('contact_section_description', __('Contact section description'))->limit(50 );
        $grid->column('location', __('Location'));
        $grid->column('email', __('Email'));
        $grid->column('call', __('Call'));
        $grid->column('map', __('Map'));
        $grid->column('footer_company_logo', __('Footer company logo'))->image();
        $grid->column('footer_useful_links_title', __('Footer useful links title'));
        $grid->column('footer_our_services_title', __('Footer our services title'));
        $grid->column('social_networks_title', __('Social networks title'));
        $grid->column('social_networks_description', __('Social networks description'))->limit(50 );
        $grid->column('fb_link', __('Fb link'));
        $grid->column('twitter_link', __('Twitter link'));
        $grid->column('insta_link', __('Insta link'));
        $grid->column('skype_link', __('Skype link'));
        $grid->column('linkedin_link', __('Linkedin link'));
        $grid->column('copyright_text', __('Copyright text'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Settings::findOrFail($id));

        
        $show->field('id', __('Id'));
        $show->field('header_company_logo', __('Header company logo'))->image();
        $show->navItems('Nav Items', function ($navItems) {

            $navItems->resource('/admin/nav-items');
        
            $navItems->item_name();
            $navItems->section_id();
            $navItems->item_link();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });
        $show->field('hero_section_title', __('Hero section title'));
        $show->field('hero_section_sub_title', __('Hero section sub title'));
        $show->field('hero_section_bg_image', __('Hero section bg image'))->image();
        $show->field('services_title', __('Services title'));
        $show->field('services_description', __('Services description'));

        $show->servicesCards('Services Cards', function ($servicesCards) {

            $servicesCards->resource('/admin/services-cards');
        
            $servicesCards->icon();
            $servicesCards->title();
            $servicesCards->short_description();
            $servicesCards->details();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('teravision_title', __('Teravision title'));
        $show->field('teravision_sub_title', __('Teravision sub title'));
        $show->field('teravision_description', __('Teravision description'));
        $show->field('teravision_image', __('Teravision image'))->image();

        $show->teravisionNodes('Teravision Nodes', function ($teravisionNodes) {

            $teravisionNodes->resource('/admin/teravision-nodes');
        
            $teravisionNodes->title();
            $teravisionNodes->short_description();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('aboutus_title', __('Aboutus title'));
        $show->field('aboutus_details', __('Aboutus details'));

        $show->testmonials('Testmonials', function ($testmonials) {

            $testmonials->resource('/admin/testmonials');
        
            $testmonials->image();
            $testmonials->review();
            $testmonials->reviewer_name();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('contact_section_title', __('Contact section title'));
        $show->field('contact_section_description', __('Contact section description'));
        $show->field('location', __('Location'));
        $show->field('email', __('Email'));
        $show->field('call', __('Call'));
        $show->field('map', __('Map'));
        $show->field('footer_company_logo', __('Footer company logo'))->image();
        $show->field('footer_useful_links_title', __('Footer useful links title'));

        $show->usefulLinks('Useful Links', function ($usefulLinks) {

            $usefulLinks->resource('/admin/useful-links');
        
            $usefulLinks->name();
            $usefulLinks->link();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('footer_our_services_title', __('Footer our services title'));

        $show->ourServicesLinks('Our Services Links', function ($ourServicesLinks) {

            $ourServicesLinks->resource('/admin/our-services-links');
        
            $ourServicesLinks->name();
            $ourServicesLinks->link();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('social_networks_title', __('Social networks title'));
        $show->field('social_networks_description', __('Social networks description'));
        $show->field('fb_link', __('Fb link'));
        $show->field('twitter_link', __('Twitter link'));
        $show->field('insta_link', __('Insta link'));
        $show->field('skype_link', __('Skype link'));
        $show->field('linkedin_link', __('Linkedin link'));
        $show->field('copyright_text', __('Copyright text'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        // return Admin::content(function (Content $content) use ($id) {

        //     $content->header('Post');
        //     $content->description('Detail');

        //     $content->body(Admin::show(Settings::findOrFail($id), function (Show $show) {

        //         $show->field('id', __('Id'));
        //         $show->field('header_company_logo', __('Header company logo'));
        //         $show->divider();
        //         $show->field('hero_section_title', __('Hero section title'));

        //     }));
        // });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Settings());

        $form->divider('Header');
        $form->image('header_company_logo', __('Header company logo'));
        $form->hasMany('navItems','Enter Nav Items', function (Form\NestedForm $form) {
            $form->text('item_name');
            $form->text('section_id');
            $form->text('item_link');
        });

        $form->divider('Hero Section');

        $form->text('hero_section_title', __('Hero section title'));
        $form->text('hero_section_sub_title', __('Hero section sub title'))->rules('required|max:250');
        $form->image('hero_section_bg_image', __('Hero section bg image'));

        $form->divider('Services Section');

        $form->text('services_title', __('Services title'));
        $form->text('services_description', __('Services description'))->rules('required|max:250');

        $form->hasMany('servicesCards','Enter Services Cards', function (Form\NestedForm $form) {
            $form->image('icon');
            $form->text('title');
            $form->text('short_description')->rules('required|max:250');
            $form->quill('details');
        });

        $form->divider('Teravision Section');

        $form->text('teravision_title', __('Teravision title'));
        $form->text('teravision_sub_title', __('Teravision sub title'));
        $form->text('teravision_description', __('Teravision description'))->rules('required|max:250');
        $form->image('teravision_image', __('Teravision image'));

        $form->hasMany('teravisionNodes','Enter Teravision Nodes', function (Form\NestedForm $form) {
            $form->text('title');
            $form->text('short_description')->rules('required|max:250');
        });

        $form->divider('About Us Section');

        $form->text('aboutus_title', __('About us title'));
        $form->quill('aboutus_details', __('About us details'));

        $form->divider('Testmonials Section');

        $form->hasMany('testmonials','Enter Testmonials', function (Form\NestedForm $form) {
            $form->image('image', __('Reviewer Image'));
            $form->text('review');
            $form->text('reviewer_name');
        });

        $form->divider('Contact Section');

        $form->text('contact_section_title', __('Contact section title'));
        $form->text('contact_section_description', __('Contact section description'))->rules('required|max:250');
        $form->text('location', __('Location'));
        $form->email('email', __('Email'));
        $form->mobile('call', __('Call'))->options(['mask' => '+99999 9999999']);
        $form->text('map', __('Map'));
        //$form->latlong('latitude', 'longitude', 'Map')->default(['lat' => 90, 'lng' => 90]);

        $form->divider('Footer Section');

        $form->image('footer_company_logo', __('Company Footer Logo'));
        $form->text('footer_useful_links_title', __('Footer useful links title'));

        $form->hasMany('usefulLinks','Enter Useful Links', function (Form\NestedForm $form) {
            $form->text('name');
            $form->text('link');
        });

        $form->text('footer_our_services_title', __('Footer our services title'));

        $form->hasMany('ourServicesLinks','Enter Services Links', function (Form\NestedForm $form) {
            $form->text('name');
            $form->text('link');
        });

        $form->text('social_networks_title', __('Social networks title'));

        $form->text('social_networks_description', __('Social networks description'));
        $form->text('fb_link', __('Fb link'));
        $form->text('twitter_link', __('Twitter link'));
        $form->text('insta_link', __('Insta link'));
        $form->text('skype_link', __('Skype link'));
        $form->text('linkedin_link', __('Linkedin link'));
        $form->text('copyright_text', __('Copyright text'))->rules('required|max:250');

        

        return $form;
    }
}
