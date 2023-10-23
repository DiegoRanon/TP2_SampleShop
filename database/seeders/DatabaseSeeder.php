<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Article;
use App\Models\Cthegory;

class DatabaseSeeder extends Seeder

{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
        [
            'title' => 'Titre essai',
            'content' => 'Ceci est un essai d insertion de données par seeders',
            'created_at' => now(),
            'updated_at' => now(),
            //'user_id'=>auth::user()->id()
            'user_id'=>user()->id()
        ],

        [
            'title' => 'Titre essai2',
            'content' => 'Ceci est un essai d insertion de données par seeders',
            'created_at' => now(),
            'updated_at' => now(),
           // 'user_id'=>auth::user()->id()
           'user_id'=>user->id()
        ],
        





        ] );
    }
}
