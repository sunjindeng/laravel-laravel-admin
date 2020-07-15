<?php


namespace App\Admin\models;

use Illuminate\Database\Eloquent\Model;
use DB;
class ConsumeType extends Model
{
    protected $table = 'consume_type';
    public $timestamps = false;
    /**
     * 关联消费详情type
     */
    public function consumeContent()
    {
        return $this->hasMany(ConsumeContent::class);
    }

    /**
     * 为消费详情添加数据下拉菜单提供接口
     * @return mixed
     */
    public function consumeTypeList(){
        $return = DB::table($this->table)->select('id','name')->get()->map(function($value){return (array)$value;})->toArray();
        $consumeTypeArray = [];
        foreach($return as $k=>$v){
            $consumeTypeArray[$v['id']] = $v['name'];
        }
        return $consumeTypeArray;
    }

}
