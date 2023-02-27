<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateLitecmsPagePagesTable extends Migration
{
    /*
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {

        /*
         * Table: litecms_page_pages
         */
        Schema::create('litecms_page_pages', function ($table) {
            $table->increments('id');
            $table->string('name', 100)->nullable();
            $table->text('title')->nullable();
            $table->text('heading')->nullable();
            $table->text('sub_heading')->nullable();
            $table->text('abstract')->nullable();
            $table->text('content')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->mediumText('banner')->nullable();
            $table->text('images')->nullable();
            $table->tinyInteger('compile')->nullable();
            $table->string('view', 20)->nullable();
            $table->string('category', 20)->nullable();
            $table->integer('order')->nullable();
            $table->string('slug', 200)->nullable();
            $table->enum('status', ['Show', 'Hide'])->nullable();
            $table->string('upload_folder', 100)->nullable();
            $table->text('marking', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }

    /*
    * Reverse the migrations.
    *
    * @return void
    */

    public function down()
    {
        Schema::drop('litecms_page_pages');
    }
}
