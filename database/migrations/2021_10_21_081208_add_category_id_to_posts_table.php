<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToPostsTable extends Migration
{

    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // membuat kolom category_id yg bertindak sebagai foreign key
            $table->foreignId('category_id')->nullable()->after('id');
        });
    }

    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('category_id');
        });
    }
}
