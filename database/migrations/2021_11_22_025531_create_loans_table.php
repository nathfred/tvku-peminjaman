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
            $table->text('quantity');
            $table->text('items');
            $table->string('program');
            $table->string('location');
            $table->date('book_date');
            $table->time('book_time');
            $table->string('division');
            $table->string('req_name');
            $table->string('req_phone');
            $table->string('req_signed');
            $table->string('crew_name');
            $table->string('crew_phone');
            $table->string('crew_signed');
            $table->string('crew_division');
            $table->string('app_name');
            $table->string('app_phone');
            $table->string('app_signed');
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
