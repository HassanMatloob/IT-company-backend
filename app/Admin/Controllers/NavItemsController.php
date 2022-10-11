<?php

namespace App\Admin\Controllers;

use App\Models\NavItems;
use App\Models\Settings;
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
    protected $title = 'Nav Items';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new NavItems());

        $grid->column('id', __('ID'));
        $grid->column('item_name', __('Item Name'));
        $grid->column('section_id', __('Section ID'));
        $grid->column('item_link', __('Item Link'));
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
        $show = new Show(NavItems::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('item_name', __('Item Name'));
        $show->field('section_id', __('Section ID'));
        $show->field('item_link', __('Item Link'));
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
        $form = new Form(new NavItems());

        $form->text('item_name', __('Item Name'));
        $form->text('section_id', __('Section ID'));
        $form->text('item_link', __('Item Link'));
        $form->select('setting_id', __('Company'))->options(Settings::all()->pluck('company_name','id'))->rules('required');

        return $form;
    }
}
