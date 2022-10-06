<?php

namespace App\Admin\Controllers;

use App\Models\UsefulLinks;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsefulLinksController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'UsefulLinks';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UsefulLinks());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('link', __('Link'));
        $grid->column('setting_id', __('Setting id'));
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
        $show = new Show(UsefulLinks::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('link', __('Link'));
        $show->field('setting_id', __('Setting id'));
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
        $form = new Form(new UsefulLinks());

        $form->text('name', __('Name'));
        $form->url('link', __('Link'));
        $form->number('setting_id', __('Setting id'));

        return $form;
    }
}
