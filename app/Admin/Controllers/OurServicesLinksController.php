<?php

namespace App\Admin\Controllers;

use App\Models\OurServicesLinks;
use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OurServicesLinksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Our Services Links';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OurServicesLinks());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('link', __('Link'));
        $grid->column('setting_id', __('Setting ID'));
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
        $show = new Show(OurServicesLinks::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('link', __('Link'));
        $show->field('setting_id', __('Setting ID'));
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
        $form = new Form(new OurServicesLinks());

        $form->text('name', __('Name'));
        $form->url('link', __('Link'));
        $form->select('setting_id', __('Company'))->options(Settings::all()->pluck('company_name','id'))->rules('required');

        return $form;
    }
}
