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
            $table->unsignedBigInteger('user_id')->after('id');
            $table->string('level')->nullable()->after('type');
            $table->dropForeign(['level_id']);
            $table->dropColumn('level_id');
            $table->integer('reward_token')->default(0)->after('description');
            $table->enum('status', ['sent', 'approved', 'in_progress', 'solved', 'rejected'])->default('sent')->after('reward_token');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('cases', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'level', 'reward_token', 'status']);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('id')->on('levels');
        });
    }

};
