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
        Schema::create('jobs', function (Blueprint $table) {
            //$table->id()
            $table->bigIncrements('id');
            
            $table->string('title');
            $table->string('position');
            $table->text('description');
            $table->string('location')->nullable();
            $table->string('category');
            $table->string('type');//job nature
            //$table->enum('type', array('full time', 'part time,','remote','freelance','any'));	
            $table->smallInteger('experience');
            $table->integer('vacancy')->nullable();
            $table->decimal('salary',15,2)->nullable();
            //$table->text('experience')->nullable();
            //$table->text('education')->nullable();
            //$table->text('skills')->nullable();
            
            $table->date('app_date')->default(DB::raw('NOW()'));

            //$table->date('posted_date')->useCurrent = true;
            
            //$table->foreignId('company_id')->constrained('companies');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            
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
        Schema::dropIfExists('jobs');
    }
};
