<?php

namespace App\Admin\Controllers;

use App\Models\Messages;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MessagesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Messages';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Messages());

        // $grid->filter(function($filter){

        //     // Remove the default id filter
        //     $filter->disableIdFilter();

        //     // Add a column filter
        //     $filter->like('name', 'name');

        // });

        $grid->column('id', __('ID'))->sortable();
        $grid->column('name', __('Name'))->filter();
        $grid->column('email', __('Email'))->filter();
        $grid->column('subject', __('Subject'));
        $grid->column('message', __('Message'))->date('Y-m-d');
        //$grid->column('setting_id', __('Setting ID'));
        $grid->column('created_at', __('Created at'))->filter('range', 'datetime')->display(function ($created_at) {

            $data['datetime'] = explode("T", $created_at);
            $date = $data['datetime'][0];
            $time = $data['datetime'][1];

            $data['timezone'] = explode(".", $time);
            $_time = $data['timezone'][0];

            return $date.' '.$_time;
        });;
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
        $show = new Show(Messages::findOrFail($id));

        $show->field('id', __('ID'));
        $show->field('name', __('Name'));
        $show->field('email', __('Email'));
        $show->field('subject', __('Subject'));
        $show->field('message', __('Message'));
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
        $form = new Form(new Messages());

        //$form->text('name', __('Name'));
        //$form->email('email', __('Email'));
        //$form->text('subject', __('Subject'));
        //$form->textarea('message', __('Message'));

        return $form;
    }
}
