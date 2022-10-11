<?php

namespace App\Admin\Controllers;

use App\Models\UsefulLinks;
use App\Models\Settings;
use App\Models\NavItems;
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
    protected $title = 'Useful Links';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new UsefulLinks());

        $grid->column('id', __('ID'));
        $grid->column('name', __('Name'));
        $grid->column('link', __('Link'));
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
        $show = new Show(UsefulLinks::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('link', __('Link'));
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
        //$NavItems = NavItems::all();
        $option = [];
        //$option1 = [];

        $option[0] = 'Please Select';

        if ($settings) {
            foreach ($settings as $setting) {
                $option[$setting->id] = $setting->id;
            }
        }
        // if ($NavItems) {
        //     foreach ($NavItems as $NavItem) {
        //         $isCheck = UsefulLinks::where('name', $NavItem->item_name)->first();
        //         if (isset($isCheck->name)) {
        //             array_push($option1, $NavItem->item_name);
        //         }
        //     }
        // }

        //dd($option1);

        $form = new Form(new UsefulLinks());

        $form->text('name', __('Name'));
        //$form->select('name', __('Name'))->options($option1)->rules('required');
        $form->text('link', __('Link'));
        $form->select('setting_id', __('Company'))->options(Settings::all()->pluck('company_name','id'))->rules('required');

        return $form;
    }
}
