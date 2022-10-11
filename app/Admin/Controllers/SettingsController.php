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

        //$filter->like('company_name', 'Company Name');

        $grid->column('id', __('Id'));
        $grid->column('header_company_logo', __('Header Company Logo'))->image();
        $grid->column('hero_section_title', __('Hero Section Title'));
        $grid->column('hero_section_sub_title', __('Hero Section Sub-Title'))->limit(50);
        $grid->column('hero_section_bg_image', __('Hero Section Background Image'))->image();
        $grid->column('services_title', __('Services Title'));
        $grid->column('services_description', __('Services Description'))->limit(50);
        $grid->column('teravision_title', __('Why Us Title'));
        $grid->column('teravision_sub_title', __('Why Us Sub-Title'))->limit(50);
        $grid->column('teravision_description', __('Why Us Description'))->limit(50);
        $grid->column('teravision_image', __('Why Us Image'))->image();
        $grid->column('aboutus_title', __('About Us Title'));
        $grid->column('aboutus_details', __('About Us Details'))->limit(50);
        $grid->column('contact_section_title', __('Contact Section Title'));
        $grid->column('contact_section_description', __('Contact Section Description'))->limit(50);
        $grid->column('location', __('Location'));
        $grid->column('email', __('Email'));
        $grid->column('call', __('Call'));
        $grid->column('map', __('Map'));
        $grid->column('footer_company_logo', __('Footer Company Logo'))->image();
        $grid->column('footer_useful_links_title', __('Footer Useful Links Title'));
        $grid->column('footer_our_services_title', __('Footer Our Services Title'));
        $grid->column('social_networks_title', __('Social Networks Title'));
        $grid->column('social_networks_description', __('Social Networks Description'))->limit(50);
        $grid->column('fb_link', __('Facebook Link'));
        $grid->column('twitter_link', __('Twitter Link'));
        $grid->column('insta_link', __('Instagram Link'));
        $grid->column('skype_link', __('Skype Link'));
        $grid->column('linkedin_link', __('Linkedin Link'));
        $grid->column('copyright_text', __('Copyright Text'));

        $grid->disableCreateButton();
        $grid->disableExport();
        $grid->disableRowSelector();
        //$grid->disableActions();
        //$grid->column('created_at', __('Created at'));
        //$grid->column('updated_at', __('Updated at'));

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
        $show->field('header_company_logo', __('Header Company Logo'))->image();
        $show->navItems('Nav Items', function ($navItems) {

            $navItems->resource('/admin/nav-items');

            $navItems->item_name();
            $navItems->section_id();
            $navItems->item_link();

            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });
        $show->field('hero_section_title', __('Hero Section Title'));
        $show->field('hero_section_sub_title', __('Hero Section Sub-Title'));
        $show->field('hero_section_bg_image', __('Hero Section Background Image'))->image();
        $show->field('services_title', __('Services Title'));
        $show->field('services_description', __('Services Description'));

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

        $show->field('teravision_title', __('Why Us Title'));
        $show->field('teravision_sub_title', __('Why Us Sub-Title'));
        $show->field('teravision_description', __('Why Us Description'));
        $show->field('teravision_image', __('Why Us Image'))->image();

        $show->teravisionNodes('Why Us Nodes', function ($teravisionNodes) {

            $teravisionNodes->resource('/admin/teravision-nodes');

            $teravisionNodes->title();
            $teravisionNodes->short_description();

            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('aboutus_title', __('About Us Title'));
        $show->field('aboutus_details', __('About Us Details'));

        $show->testmonials('Testmonials', function ($testmonials) {

            $testmonials->resource('/admin/testmonials');

            $testmonials->image();
            $testmonials->review();
            $testmonials->reviewer_name();

            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('contact_section_title', __('Contact Section Title'));
        $show->field('contact_section_description', __('Contact Section Description'));
        $show->field('location', __('Location'));
        $show->field('email', __('Email'));
        $show->field('call', __('Call'));
        $show->field('map', __('Map'));
        $show->field('footer_company_logo', __('Footer Company Logo'))->image();
        $show->field('footer_useful_links_title', __('Footer Useful Links Title'));

        $show->usefulLinks('Useful Links', function ($usefulLinks) {

            $usefulLinks->resource('/admin/useful-links');

            $usefulLinks->name();
            $usefulLinks->link();

            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('footer_our_services_title', __('Footer Our Services Title'));

        $show->ourServicesLinks('Our Services Links', function ($ourServicesLinks) {

            $ourServicesLinks->resource('/admin/our-services-links');

            $ourServicesLinks->name();
            $ourServicesLinks->link();

            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });

        $show->field('social_networks_title', __('Social Networks Title'));
        $show->field('social_networks_description', __('Social Networks Description'));
        $show->field('fb_link', __('Facebook Link'));
        $show->field('twitter_link', __('Twitter Link'));
        $show->field('insta_link', __('Instagram Link'));
        $show->field('skype_link', __('Skype Link'));
        $show->field('linkedin_link', __('Linkedin Link'));
        $show->field('copyright_text', __('Copyright Text'));
        //$show->field('created_at', __('Created at'));
        //$show->field('updated_at', __('Updated at'));

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

        // $form->divider('Header')->style('font','20px');

        $form->tools(function (Form\Tools $tools) {

            // Disable `List` btn.
            $tools->disableList();
        
            // Disable `Delete` btn.
            //$tools->disableDelete();
        
            // Disable `Veiw` btn.
            $tools->disableView();
        
            // Add a button, the argument can be a string, or an instance of the object that implements the Renderable or Htmlable interface
            $tools->append('<a href="https://itcompany.axiscodingsolutions.com/" target="_blank" class="btn btn-sm btn-info" style="margin-right:10px;"><i class="fa fa-eye"></i> View</a>');
        });



        // $form->divider('Hero Section');

        $form->tab('Header Section', function ($form) {

            $form->text('company_name', __('Company Name'))->rules('required');
            $form->image('header_company_logo', __('Header Company Logo'))->rules('required');
            $form->hasMany('navItems', 'Enter Nav Items', function (Form\NestedForm $form) {
                $form->text('item_name', __('Item Name'))->rules('required');
                $form->text('section_id', __('Section ID'))->rules('required');
                $form->text('item_link', __('Item Link'))->rules('required');
            });
        });

        
        $form->tab('Hero Section', function ($form) {
            $form->text('hero_section_title', __('Hero Section Title'))->rules('required');
            $form->text('hero_section_sub_title', __('Hero Section Sub-Title'))->rules('required|max:250');
            $form->image('hero_section_bg_image', __('Hero Section Background Image'))->rules('required');
        });
        
        $form->tab('Services Section', function ($form) {
            $form->text('services_title', __('Services Title'))->rules('required');
            $form->textarea('services_description', __('Services Description'))->rules('required|max:250');

            $form->hasMany('servicesCards', 'Enter Services Cards', function (Form\NestedForm $form) {
                $form->icon('icon', __('Icon'))->rules('required');
                $form->text('title', __('Title'))->rules('required');
                $form->textarea('short_description', __('Short Description'))->rules('required|max:250');
                $form->quill('details', __('Details'))->rules('required');
            });
        });
        
        $form->tab('Why Us Section', function ($form) {
            $form->text('teravision_title', __('Why Us Title'))->rules('required');
            $form->text('teravision_sub_title', __('Why Us Sub-Title'))->rules('required');
            $form->textarea('teravision_description', __('Why Us Description'))->rules('required|max:250');
            $form->image('teravision_image', __('Why Us Image'))->rules('required');

            $form->hasMany('teravisionNodes', 'Enter Why Us Nodes', function (Form\NestedForm $form) {
                $form->text('title', __('Title'))->rules('required');
                $form->textarea('short_description', __('Short Description'))->rules('required|max:250');
            });
        });
        
        $form->tab('About Us Section', function ($form) {
            $form->text('aboutus_title', __('About Us Title'))->rules('required');
            $form->quill('aboutus_details', __('About Us Details'))->rules('required');
        });
        
        $form->tab('Testmonials Section', function ($form) {
            $form->hasMany('testmonials', 'Enter Testmonials', function (Form\NestedForm $form) {
                $form->image('image', __('Reviewer Image'))->rules('required');
                $form->textarea('review', __('Review'))->rules('required|max:250');
                $form->text('reviewer_name', __('Reviewer Name'))->rules('required');
            });
        });
        
        $form->tab('Contact Section', function ($form) {
            $form->text('contact_section_title', __('Contact Section Title'))->rules('required');
            $form->textarea('contact_section_description', __('Contact Section Description'))->rules('required|max:250');
            $form->text('location', __('Location'))->rules('required');
            $form->email('email', __('Email'))->rules('required');
            $form->mobile('call', __('Call'))->options(['mask' => '+99999 9999999'])->rules('required');
            //$form->text('map', __('Map'));
            //$form->map('latitude', 'longitude', 'Map');
            $form->latlong('latitude', 'longitude', 'Map')->default(['lat' => 90, 'lng' => 90]);
        });
        
        $form->tab('Footer Section', function ($form) {
            $form->image('footer_company_logo', __('Company Footer Logo'))->rules('required');
            $form->text('footer_useful_links_title', __('Footer Useful Links Title'))->rules('required');

            $form->hasMany('usefulLinks', 'Enter Useful Links', function (Form\NestedForm $form) {
                $form->text('name', __('Name'))->rules('required');
                $form->text('link', __('Link'))->rules('required');
            });

            $form->text('footer_our_services_title', __('Footer Our Services Title'));

            $form->hasMany('ourServicesLinks', 'Enter Services Links', function (Form\NestedForm $form) {
                $form->text('name', __('Name'))->rules('required');
                $form->text('link', __('Link'))->rules('required');
            });

            $form->text('social_networks_title', __('Social Networks Title'))->rules('required');

            $form->textarea('social_networks_description', __('Social Networks Description'))->rules('required');
            $form->text('fb_link', __('Facebook Link'))->rules('required');
            $form->text('twitter_link', __('Twitter Link'))->rules('required');
            $form->text('insta_link', __('Instagram Link'))->rules('required');
            $form->text('skype_link', __('Skype Link'))->rules('required');
            $form->text('linkedin_link', __('Linkedin Link'))->rules('required');
            $form->text('copyright_text', __('Copyright Text'))->rules('required|max:250');
        });

        // $form->divider('Footer Section');

        // $form->image('footer_company_logo', __('Company Footer Logo'));
        // $form->text('footer_useful_links_title', __('Footer useful links title'));

        // $form->hasMany('usefulLinks','Enter Useful Links', function (Form\NestedForm $form) {
        //     $form->text('name');
        //     $form->text('link');
        // });

        // $form->text('footer_our_services_title', __('Footer our services title'));

        // $form->hasMany('ourServicesLinks','Enter Services Links', function (Form\NestedForm $form) {
        //     $form->text('name');
        //     $form->text('link');
        // });

        // $form->text('social_networks_title', __('Social networks title'));

        // $form->text('social_networks_description', __('Social networks description'));
        // $form->text('fb_link', __('Fb link'));
        // $form->text('twitter_link', __('Twitter link'));
        // $form->text('insta_link', __('Insta link'));
        // $form->text('skype_link', __('Skype link'));
        // $form->text('linkedin_link', __('Linkedin link'));
        // $form->text('copyright_text', __('Copyright text'))->rules('required|max:250');

        $form->saved(function (Form $form) {

            return redirect('/admin');
        
        });
        return $form;
    }
}
