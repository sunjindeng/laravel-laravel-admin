<?php
namespace App\Admin\models;

use Illuminate\Database\Eloquent\Model;

class ConsumeContent extends  Model
{
    protected $table = 'consume.consume_content';
    public $timestamps = false;

    /**
     * 关联消费类别(consumeType)
     */
    public function consumeType()
    {
        return $this->belongsTo(ConsumeType::class,'type','id');
    }
    /**
     * 关联用户表（user）
     */

    public function user()
    {
        return $this->belongsTo(Users::class,'user_id','id');
    }
}
