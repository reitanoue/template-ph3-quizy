<?php

use Illuminate\Database\Seeder;

class QuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(
            [
                [
                    'big_question_id' => '1',
                    'image' => 'takanawa.png'
                ],
                [
                    'big_question_id' => '1',
                    'image' => 'kameido.png'
                ],
                [
                    'big_question_id' => '1',
                    'image' => 'kouzimachi.png'
                ],
                [
                    'big_question_id' => '2',
                    'image' => 'mukainada.png'
                ],
                [
                    'big_question_id' => '2',
                    'image' => 'mitsugi.png'
                ],
                [
                    'big_question_id' => '2',
                    'image' => 'kanayama.png'
                ]
            ]
        );
    }
}
