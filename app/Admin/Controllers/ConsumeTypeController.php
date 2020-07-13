<?php


namespace App\Admin\Controllers;

use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\models\ConsumeType;
class ConsumeTypeController extends AdminController
{
    protected $title = '消费类型';
    protected function grid()
    {
        $grid = new Grid(new ConsumeType());
        $grid->column('id', __('Id'));
        $grid->column('name', __('名称'));
        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();
            // 在这里添加字段过滤器
            $filter->like('name', 'name');
        });
        $grid->expandFilter();
        return $grid;
    }

    protected function detail($id)
    {
        $show = new Show(ConsumeType::findOrFail($id));
        $show->field('name', __('名称'));
        return $show;
    }

    protected function form()
    {
        $form = new Form(new ConsumeType());
        $form->text('name', __('名称'));
        return $form;
    }


}
