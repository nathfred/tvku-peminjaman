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
            $table->string('program');
            $table->string('location');
            $table->date('created')->nullable();
            $table->date('book_date');
            $table->time('book_time');
            $table->string('division');
            $table->string('req_name')->nullable();
            $table->string('req_phone')->nullable();
            $table->boolean('req_signed')->nullable();
            $table->string('crew_name')->nullable();
            $table->string('crew_phone')->nullable();
            $table->boolean('crew_signed')->nullable();
            $table->string('crew_division')->nullable();
            $table->string('app_name')->nullable();
            $table->string('app_phone')->nullable();
            $table->boolean('app_signed')->nullable();
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
