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
        Schema::create('menus', function (Blueprint $table) {
            $table->string('id_menu', 31)->primary();
            $table->string('id_level', 30);
            $table->string('menu_name', 300);
            $table->string('menu_link', 300);
            $table->string('menu_icon', 200);
            $table->string('parent_id', 31)->nullable();
            $table->string('create_by', 30);
            $table->timestamp('create_date')->useCurrent();
            $table->string('delete_mark', 1)->default('N');
            $table->string('update_by', 30);
            $table->timestamp('update_date')->useCurrent();
            $table->timestamps();

            $table->foreign('id_level')->references('id_level')->on('menu_levels')->onDelete('cascade');
            $table->foreign('parent_id')->references('id_menu')->on('menus')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('menus');
    }
};