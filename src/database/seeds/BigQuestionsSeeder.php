<?php

use Illuminate\Database\Seeder;

class BigQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            array('name'=>'東京の難読地名クイズ'),
            array('name'=>'広島の難読地名クイズ')
            //...
        );
        DB::table('big_questions')->insert($data); // Query Builderでの方法
    }
}
