<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('post_name_th');
            $table->string('post_name_en')->nullable();
            $table->text('post_description')->nullable();
            $table->string('post_image')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string('post_short')->after('post_name_en');
            $table->enum('post_views', ['intro', 'default'])->default('default')->after('post_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
