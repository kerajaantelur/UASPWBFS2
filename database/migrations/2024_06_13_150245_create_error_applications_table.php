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
        Schema::create('error_application', function (Blueprint $table) {
            $table->id('error_id');
            $table->unsignedBigInteger('user_id');
            $table->string('module', 100);
            $table->string('controller', 100);
            $table->string('function', 100);
            $table->string('error_message', 300);
            $table->string('status', 1);
            $table->timestamp('create_time')->useCurrent();
            $table->string('delete_mark', 1)->default('N');
            $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('error_application');
    }
};