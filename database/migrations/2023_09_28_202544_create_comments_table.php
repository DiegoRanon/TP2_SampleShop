<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->String('user_name');
            $table->mediumText('Content');
            $table->timestamps();
        });
       // Schema::create('comments', function (Blueprint $table) {
           
          //  $table->unsignedInteger('article_id');
           // $table->foreign('article_id')
            //      ->references('id')
              //    ->on('articles')
              //    ->onDelete('restrict')
                //  ->onUpdate('restrict');
       // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
