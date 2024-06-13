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
        Schema::create('user_photos', function (Blueprint $table) {
            $table->id('no_foto');
            $table->unsignedBigInteger('user_id');
            $table->string('foto', 200);
            $table->timestamp('create_date')->useCurrent();
            $table->string('delete_mark', 1)->default('N');
            $table->timestamps();

              $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_foto');
    }
};