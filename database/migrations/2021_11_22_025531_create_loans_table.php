<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->boolean('approval');
            $table->boolean('return');
            $table->string('program', 24);
            $table->string('location', 24);
            $table->date('created')->nullable();
            $table->date('book_date');
            $table->time('book_time');
            $table->string('division', 16);
            $table->string('req_name', 24)->nullable();
            $table->string('req_phone', 16)->nullable();
            $table->boolean('req_signed')->nullable();
            $table->string('crew_name', 24)->nullable();
            $table->string('crew_phone', 16)->nullable();
            $table->boolean('crew_signed')->nullable();
            $table->string('crew_division', 16)->nullable();
            $table->string('app_name', 24)->nullable();
            $table->string('app_phone', 16)->nullable();
            $table->boolean('app_signed')->nullable();
            // $table->string('return_attachment', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
