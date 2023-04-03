<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;
use App\Models\News;
use App\Models\Reader;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        /****** Creamos 20 News fake  ************* */
        News::factory(20)->create();

        /****** Creamos 20 lectores fake y le suscribimos al azar ******** */
        Reader::factory(20)
                ->create()
                ->each(function($reader){
                    $num = mt_rand(1,10);
                    $news = News::find($num);
                    DB::table('news_reader')->insert([
                            ['reader_id'=>$reader->id,
                             'news_id' =>$news->id,
                            ]
                            ]);
                         });
    }
}

/* Fe de erratas: Faltaria crear en factorys news y lectores con mas de una suscripcion,
                   lo dejo para carga manual, para no ensuciar este script */
