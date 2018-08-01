<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Users::class, 10)->create();
        factory(\App\Libraries::class, 100)->create()->each(function ($libraries){
            $boolean = rand(0,1);
            $ids = range(0,10);
            shuffle($ids);

            if($boolean){
                $sliced = array_slice($ids,0,2);
                $libraries->Users()->attach($sliced);
            }
        });
    }
}
