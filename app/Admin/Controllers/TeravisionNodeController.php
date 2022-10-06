<?php

namespace App\Admin\Controllers;

use App\Models\TeravisionNode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class TeravisionNodeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'TeravisionNode';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new TeravisionNode());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('short_description', __('Short description'));
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
        $show = new Show(TeravisionNode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('short_description', __('Short description'));
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
        $form = new Form(new TeravisionNode());

        $form->text('title', __('Title'));
        $form->text('short_description', __('Short description'));
        $form->number('setting_id', __('Setting id'));

        return $form;
    }
}
