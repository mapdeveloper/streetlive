<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

 Schema::create('ngos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('name');
            $table->string('regdoffice')->nullable();
            $table->string('address')->nullable();
            $table->string('vision')->nullable();
            $table->string('email')->unique();
            $table->string('phoneno')->nullable();
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
         Schema::drop('ngos');
    }
}
