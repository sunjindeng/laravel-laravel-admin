<?php

namespace App\Admin\Controllers;

use App\Admin\models\Users;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UsersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Users';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Users());

        $grid->column('id', __('Id'));
        $grid->column('username', __('用户名称'));
        $grid->column('phone', __('手机号码'));
        $grid->column('email', __('邮箱'));
        $grid->column('last_login_time', __('最后登录时间'));
        $grid->column('create_time', __('账号创建时间'));
        $grid->column('status', __('账号状态'));
        $grid->column('last_ip', __('最后登录ip地址'));

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
        $show = new Show(Users::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('用户名称'));
        $show->field('phone', __('手机号码'));
        $show->field('email', __('邮箱'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Users());

        $form->text('username', __('用户名称'));
        $form->email('email', __('邮箱'));
        $form->text('phone',__('手机号码'));
        $form->datetime('update_time', __('Email verified at'))->default(date('Y-m-d H:i:s'));
        $form->password('password', __('密码'));

        return $form;
    }
}
