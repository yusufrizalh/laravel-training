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
            $table->id();                       // id bigint primary key autoincrement
            $table->foreignId('user_id');
            $table->string('thumbnail')->nullable();
            $table->string('title', 200);       // varchar(20)
            $table->string('slug', 200);        // varchar(200)
            $table->text('body');               // text
            $table->timestamps();               // created_at dan updated_at
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
