<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddImageInCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->string('image')->nullable()->after('body');
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
            $table->dropColumn('image');
        });
    }
}