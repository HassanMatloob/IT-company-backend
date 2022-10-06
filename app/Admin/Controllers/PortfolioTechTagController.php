<?php

namespace App\Admin\Controllers;

use App\Models\PortfolioTechTag;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PortfolioTechTagController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PortfolioTechTag';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PortfolioTechTag());

        $grid->column('id', __('Id'));
        $grid->column('tag', __('Tag'));
        $grid->column('portfolio_id', __('Portfolio id'));
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
        $show = new Show(PortfolioTechTag::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('tag', __('Tag'));
        $show->field('portfolio_id', __('Portfolio id'));
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
        $form = new Form(new PortfolioTechTag());

        $form->text('tag', __('Tag'));
        $form->number('portfolio_id', __('Portfolio id'));

        return $form;
    }
}
