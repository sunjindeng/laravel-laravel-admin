<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Alipay\{AlipayController,AlipayNotifyController};


class TestController extends Controller
{
    /*
     * 调起支付宝支付
     * 参数type：RSA2  MD5   RSA （支付宝的三种支付方式）
     * MD5方式与RSA方式需要修改 app\Http\Controllers\AlipayBaseController里的参数
     */
    public function triceAlipay(Request $request)
    {
        $obj = new AlipayController('RSA2');
    }

    /*
     * 支付宝支付同步地址
     */
    public function alipayReturn(Request $request)
    {
        echo '<pre>';
        print_r($request->all());
    }

    /*
     * 支付宝异步回调
     */

    private function alipayNotify(Request $request)
    {
        $data = $request->all();
        $obj = new AlipayNotifyController($data);
    }


}
