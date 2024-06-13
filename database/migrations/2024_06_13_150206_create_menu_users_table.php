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
        Schema::create('menu_user', function (Blueprint $table) {
            $table->id('id_setting');
            $table->unsignedBigInteger('user_id');
            $table->string('id_menu', 3);
            $table->string('create_date', 30);
            $table->timestamp('create_time')->useCurrent();
            $table->string('delete_mark', 1)->default('N');
            $table->string('update_by', 30);
            $table->timestamp('update_date')->useCurrent();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_menu')->references('id_menu')->on('menus')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menu_user');
    }
};