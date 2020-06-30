<?php


namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;
use Encore\Admin\Layout\Content;

class ChartjsController extends Controller
{
    public function index(Content $content)
    {
        return $content->header('chartjs')->body(view('admin.chartjs'));
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
