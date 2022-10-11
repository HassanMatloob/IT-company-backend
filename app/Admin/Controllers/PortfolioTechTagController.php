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
    protected $title = 'Portfolio Tech Tags';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PortfolioTechTag());

        $grid->column('id', __('ID'));
        $grid->column('tag', __('Tag'));
        $grid->column('portfolio_id', __('Portfolio ID'));
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
        $show = new Show(PortfolioTechTag::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('tag', __('Tag'));
        $show->field('portfolio_id', __('Portfolio ID'));
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
        $form = new Form(new PortfolioTechTag());

        $form->text('tag', __('Tag'));
        $form->number('portfolio_id', __('Portfolio ID'));

        return $form;
    }
}
