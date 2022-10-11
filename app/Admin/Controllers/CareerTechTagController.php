<?php

namespace App\Admin\Controllers;

use App\Models\CareerTechTag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CareerTechTagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Career Tech Tag';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new CareerTechTag());

        $grid->column('id', __('ID'));
        $grid->column('tag', __('Tag'));
        $grid->column('career_id', __('Career ID'));
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
        $show = new Show(CareerTechTag::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('tag', __('Tag'));
        $show->field('career_id', __('Career ID'));
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
        $form = new Form(new CareerTechTag());

        $form->text('tag', __('Tag'));
        $form->number('career_id', __('Career ID'));

        return $form;
    }
}
