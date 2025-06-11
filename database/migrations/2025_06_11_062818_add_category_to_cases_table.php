<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->string('category')->default('General'); // atau 'Uncategorized'
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
