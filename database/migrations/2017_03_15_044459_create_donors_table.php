<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('donors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('phoneno')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('occupation')->nullable();
            $table->string('occupation_details')->nullable();
            $table->string('panno')->nullable();
            $table->string('others')->nullable();
            $table->tinyInteger('is_active')->default(1);  
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
        //
         Schema::drop('donors');
    }
}
