<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentarioNoticiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentario_noticias', function (Blueprint $table) {
            $table->id();
            $table->integer('id_noticia');
            $table->integer('id_usuario');
            $table->string('nombre');
            $table->integer('color_id');
            $table->string('comentario');
            $table->string('fecha');
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
        Schema::dropIfExists('comentario_noticias');
    }
}
