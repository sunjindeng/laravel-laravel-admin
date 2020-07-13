<?php

namespace App\Admin\models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';
    public $timestamps = false;
    /*
     * 关联花销详情user_id
     */
    public function consumeContent()
    {
        return $this->hasMany(ConsumeContent::class);
    }
}
