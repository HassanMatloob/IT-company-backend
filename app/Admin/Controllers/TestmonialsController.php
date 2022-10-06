<?php

namespace App\Admin\Controllers;

use App\Models\Testmonials;
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

        $grid->column('id', __('Id'));
        $grid->column('image', __('Image'));
        $grid->column('review', __('Review'));
        $grid->column('reviewer_name', __('Reviewer name'));
        $grid->column('status', __('Status'));
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
        $show = new Show(Testmonials::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('image', __('Image'));
        $show->field('review', __('Review'));
        $show->field('reviewer_name', __('Reviewer name'));
        $show->field('status', __('Status'));
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
        $form = new Form(new Testmonials());

        $form->image('image', __('Image'));
        $form->text('review', __('Review'));
        $form->text('reviewer_name', __('Reviewer name'));
        $form->text('status', __('Status'))->default('active');

        return $form;
    }
}
