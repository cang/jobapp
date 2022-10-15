<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            //$table->id();
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();//filename
            $table->string('web');
            $table->string('email')->unique();
            $table->string('address');
            $table->string('phone')->nullable();
            $table->text('info')->nullable();
            $table->text('note')->nullable();
            
            $table->timestamps();
            
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
