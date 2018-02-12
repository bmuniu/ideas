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
            $table->integer('student_id')->nullable()->unsigned();
            $table->integer('staff_id')->nullable()->unsigned();
            $table->foreign('student_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('staff_id')
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
