<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<200;$i++){
            DB::table('book')->insert([
                'title' => Str::random(20),
                'author' => Str::random(20),
            ]);
        }
    }
}
