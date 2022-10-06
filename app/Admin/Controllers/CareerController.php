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

        $grid->column('id', __('Id'));
        $grid->column('job_title', __('Job title'));
        $grid->column('job_desc', __('Job desc'));
        $grid->column('job_iamge', __('Job iamge'));
        $grid->column('setting_id', __('Setting id'));
        //$grid->column('status', __('Status'));
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
        $show = new Show(Career::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('job_title', __('Job title'));
        $show->field('job_desc', __('Job desc'));
        $show->field('job_iamge', __('Job iamge'));
        $show->field('setting_id', __('Setting id'));
        //$show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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

        $form->text('job_title', __('Job title'))->rules('required');
        $form->textarea('job_desc', __('Job desc'))->rules('required|max:250');
        $form->image('job_iamge', __('Job iamge'))->rules('required');
        $form->select('setting_id', __('Setting id'))->options($option)->rules('required');
        //$form->text('status', __('Status'))->default('active');

        $form->hasMany('careerTechTags','Enter Technology Tags', function (Form\NestedForm $form) {
            $form->text('tag');
        });

        return $form;
    }
}
