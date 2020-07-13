<?php


namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Admin\models\ConsumeType;
class ApiController extends Controller
{
    public function consumeTypeList(){
        return ConsumeType::get();
    }
}
