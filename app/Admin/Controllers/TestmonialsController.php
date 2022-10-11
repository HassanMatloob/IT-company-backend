<?php

namespace App\Admin\Controllers;

use App\Models\Testmonials;
use App\Models\Settings;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TestmonialsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Testmonials';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Testmonials());

        $grid->column('id', __('ID'));
        $grid->column('image', __('Reviewer Image'));
        $grid->column('review', __('Review'));
        $grid->column('reviewer_name', __('Reviewer Name'));
        $grid->column('setting_id', __('Setting ID'));
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
        $show = new Show(Testmonials::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('image', __('Reviewer Image'));
        $show->field('review', __('Review'));
        $show->field('reviewer_name', __('Reviewer Name'));
        $show->field('setting_id', __('Setting ID'));
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

        $form = new Form(new Testmonials());

        $form->image('image', __('Reviewer Image'))->rules('required');
        $form->textarea('review', __('Review'))->rules('required');
        $form->text('reviewer_name', __('Reviewer Name'))->rules('required');
        //$form->text('status', __('Status'))->default('active');
        $form->select('setting_id', __('Company'))->options(Settings::all()->pluck('company_name','id'))->rules('required');

        return $form;
    }
}
