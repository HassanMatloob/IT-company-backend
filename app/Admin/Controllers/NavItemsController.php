<?php

namespace App\Admin\Controllers;

use App\Models\NavItems;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NavItemsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'NavItems';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NavItems());

        $grid->column('id', __('Id'));
        $grid->column('item_name', __('Item name'));
        $grid->column('section_id', __('Section id'));
        $grid->column('item_link', __('Item link'));
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
        $show = new Show(NavItems::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('item_name', __('Item name'));
        $show->field('section_id', __('Section id'));
        $show->field('item_link', __('Item link'));
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
        $form = new Form(new NavItems());

        $form->text('item_name', __('Item name'));
        $form->text('section_id', __('Section id'));
        $form->text('item_link', __('Item link'));
        $form->number('setting_id', __('Setting id'));

        return $form;
    }
}
