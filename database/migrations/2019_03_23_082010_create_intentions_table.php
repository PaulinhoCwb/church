<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIntentionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('intentions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type');
            $table->string('nome')->nullable();
            $table->string('contato');
            $table->text('fone');
            $table->text('intencao')->nullable();
            $table->integer('falecimento')->nullable();
            $table->date('data');
            $table->time('hora');
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
        Schema::dropIfExists('intentions');
    }
}
