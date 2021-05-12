<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('agent_id')->unsigned()->nullable();
            $table->foreign('agent_id')->references('id')->on('users');
            $table->string('type')->index();
            $table->text('reason');
            $table->text('solution')->nullable();
            $table->date('creation_date');
            $table->date('attention_date')->nullable();
            $table->date('closing_date')->nullable();
            $table->integer('qualify')->nullable();
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
        Schema::dropIfExists('services');
    }
}
