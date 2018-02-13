<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdeasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ideas', function (Blueprint $table) {
            $table->increments('id');
            $table->text('idea');
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('department_id')->nullable()->unsigned();
            $table->foreign('department_id')
                ->references('id')->on('departments')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('anonymous')->default(false);
            $table->boolean('agree_to_tc')->default(false);
            $table->integer('idea_category_id')->unsigned();
            $table->foreign('idea_category_id')
                ->references('id')->on('idea_categories')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->text('document_file')->nullable();
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
        Schema::dropIfExists('ideas');
    }
}
