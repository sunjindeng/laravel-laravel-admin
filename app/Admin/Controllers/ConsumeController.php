<?php


namespace App\Admin\Controllers;

use App\Admin\models\ConsumeContent;
use Encore\Admin\Controllers\AdminController;
//use Encore\Admin\Layout\Content;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Admin\models\ConsumeType;
class ConsumeController extends AdminController
{
    /*public function index(Content $content)
    {
        return $content->header('chartjs')->body(view('admin.chartjs'));
    }*/
    protected $title = '消费列表';

    /**
     * 列表
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ConsumeContent());
        $grid->column('id', __('Id'));
        $grid->column('user.username', __('用户名称'));
        $grid->column('price', __('消费金额'))->color('red');
        $grid->column('consumeType.name', __('消费类型'));
        $grid->column('description', __('消费描述'));
        $grid->column('create_time', __('消费时间'))->display(function($time){
            return date("Y-m-d H:i:s",$time);
        });
        $grid->perPages([10, 20, 30, 40, 50]);
        $grid->disableColumnSelector();
        return $grid;
    }

    /**
     * 展示详情
     * @param $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(ConsumeContent::findOrFail($id));
        $show->field('user.username', __('用户名称'));
        $show->field('price', __('消费金额'));
        $show->field('consumeType.name', __('消费类型'));
        $show->field('description', __('消费描述'));
        $show->panel()
            ->style('warning');
        return $show;
    }

    /**
     * 添加表单
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ConsumeContent());
       /* $form->fieldset('用户信息', function (Form $form) {
            $form->text('username');
            $form->email('email');
        });*/###分组下拉式填写
        //左右分屏
       /* $form->column(1/2,function($form){*/
            $form->text('user_id','用户名称')->default(Admin::user()->id)->readonly()->width(200);
            $form->number('price','消费金额')->rules('required')->width(500);
            $consumenTypeController = new ConsumeType();
            $consumeTypeListReturn = $consumenTypeController->consumeTypeList();
            $form->radio('type','消费类型')->options($consumeTypeListReturn)->rules('required');
            $form->textarea('description','消费描述')->rules('required')->rows(3);
            $form->text('create_time','创建时间')->default(time())->readonly();
            $form->text('update_time','修改时间')->default(time())->readonly();
            $form->footer(function($footer){
                $footer->disableEditingCheck();
                $footer->disableCreatingCheck();
            });
      /*  });*/
       /* $form->column(1/2,function($form){

        });*/
        return $form;
    }

    /*
     * charjs Bor 树状图数据
     */
    public function ajaxChartJsBorRequest()
    {
        $data = [
            ['name' => 'LOL', 'grade' => 15.6],
            ['name' => 'CF', 'grade' => 18.2],
            ['name' => '吃鸡', 'grade' => 20],
            ['name' => '王者', 'grade' => 16],
            ['name' => '飞车', 'grade' => 13.2],
            ['name' => '传奇', 'grade' => 14.3],
            ['name' => '页游', 'grade' => 4.3]
        ];
        return json_encode($data, JSON_UNESCAPED_UNICODE);
    }

}
