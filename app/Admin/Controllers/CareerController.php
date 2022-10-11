<?php

namespace App\Admin\Controllers;

use App\Models\Career;
use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CareerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Career';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Career());

        $grid->column('id', __('ID'));
        $grid->column('job_title', __('Job Title'));
        $grid->column('job_desc', __('Job Description'));
        $grid->column('job_iamge', __('Job Image'))->image();
        //$grid->column('setting_id', __('Setting ID'));
        //$grid->column('status', __('Status'));
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
        $show = new Show(Career::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('job_title', __('Job Title'));
        $show->field('job_desc', __('Job Description'));
        $show->field('job_iamge', __('Job Image'))->image();
        $show->field('setting_id', __('Setting ID'));

        $show->careerTechTags('Technology Tags', function ($usefulLinks) {

            $usefulLinks->resource('/admin/career-tech-tags');
        
            $usefulLinks->tag();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });
        //$show->field('status', __('Status'));
        //$show->field('created_at', __('Created at'));
        //$show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $settings = Settings::all();
        $option = [];

        $option[0] = 'Please Select';

        if ($settings) {
            foreach ($settings as $setting) {
               $option[$setting->id] = $setting->id;
            }
        }

        $form = new Form(new Career());

        $form->text('job_title', __('Job Title'))->rules('required');
        $form->textarea('job_desc', __('Job Description'))->rules('required|max:250');
        $form->image('job_iamge', __('Job Image'))->rules('required');
        $form->select('setting_id', __('Company'))->options(Settings::all()->pluck('company_name','id'))->rules('required');
        //$form->text('status', __('Status'))->default('active');

        $form->hasMany('careerTechTags','Enter Technology Tags', function (Form\NestedForm $form) {
            $form->text('tag', __('Tag'));
        });

        return $form;
    }
}
