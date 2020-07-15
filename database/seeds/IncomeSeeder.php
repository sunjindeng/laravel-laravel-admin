<?php

use Illuminate\Database\Seeder;

class IncomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('income')->insert([
           'price' =>'20.2',
            'user_id' => 1,
            'type_id' => 1,
            'description' =>'田老师'
        ]);
    }
}
