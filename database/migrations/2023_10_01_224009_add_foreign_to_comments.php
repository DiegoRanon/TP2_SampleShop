<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
              ->references('id')
              ->on('users')
              ->onDelete('cascade')
              ->onUpdate('cascade');  
              
              $table->unsignedBigInteger('article_id');
              $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                Schema::enableForeignKeyConstraints();  
     });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
     Schema::table('comments', function (Blueprint $table) {
         Schema::disableForeignKeyConstraints();
         $table ->dropForeign('comments_user_id_foreign');
         $table->dropColumn('user_id');
         
         $table ->dropForeign('comments_article_id_foreign');
         $table->dropColumn('article_id');
     });
             
}

}
