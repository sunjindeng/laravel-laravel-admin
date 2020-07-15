<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCeshiTable extends Migration
{
    /**
     * Run the migrations.
     *（创建表）
     * @return void
     */
    public function up()
    {
        Schema::create('ceshi', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *（删除表）
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ceshi');
    }
}
