<?php

namespace App\Admin\Controllers;

use App\Models\Portfolio;
use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PortfolioController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Portfolio';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Portfolio());

        $grid->column('id', __('Id'));
        $grid->column('project_title', __('Project title'));
        $grid->column('project_desc', __('Project desc'));
        $grid->column('project_iamge', __('Project iamge'));
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
        $show = new Show(Portfolio::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('project_title', __('Project title'));
        $show->field('project_desc', __('Project desc'));
        $show->field('project_iamge', __('Project iamge'));
        $show->field('setting_id', __('Setting id'));
        //$show->field('status', __('Status'));

        $show->portfolioTechTags('Technology Tags', function ($usefulLinks) {

            $usefulLinks->resource('/admin/portfolio-tech-tags');
        
            $usefulLinks->tag();
        
            // $navItems->filter(function ($filter) {
            //     $filter->like('content');
            // });
        });
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

        $form = new Form(new Portfolio());

        $form->text('project_title', __('Project title'))->rules('required');
        $form->textarea('project_desc', __('Project Description'))->rules('required|max:250');
        $form->image('project_iamge', __('Project iamge'))->rules('required');
        $form->select('setting_id', __('Setting id'))->options($option)->rules('required');
        //$form->text('status', __('Status'))->default('active');

        $form->hasMany('portfolioTechTags','Enter Technology Tags', function (Form\NestedForm $form) {
            $form->text('tag');
        });

        return $form;
    }
}
