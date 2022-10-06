<?php

namespace App\Admin\Controllers;

use App\Models\ServicesCards;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ServicesCardsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'ServicesCards';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ServicesCards());

        $grid->column('id', __('Id'));
        $grid->column('icon', __('Icon'));
        $grid->column('title', __('Title'));
        $grid->column('short_description', __('Short description'));
        $grid->column('details', __('Details'));
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
        $show = new Show(ServicesCards::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('icon', __('Icon'));
        $show->field('title', __('Title'));
        $show->field('short_description', __('Short description'));
        $show->field('details', __('Details'));
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
        $form = new Form(new ServicesCards());

        $form->text('icon', __('Icon'));
        $form->text('title', __('Title'));
        $form->text('short_description', __('Short description'));
        $form->text('details', __('Details'));
        $form->number('setting_id', __('Setting id'));

        return $form;
    }
}