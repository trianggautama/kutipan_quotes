<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotesCommensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('subject');
            $table->integer('user_id')->unsigned();
            $table->integer('quote_id')->unsigned();
            $table->foreign('quote_id')->references('id')->on('quotes');
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quote_comments');
    }
}
