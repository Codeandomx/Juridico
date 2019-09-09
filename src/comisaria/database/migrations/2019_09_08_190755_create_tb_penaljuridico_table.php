<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPenaljuridicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            // Schema::create('tb_catdelitos', function (Blueprint $table) {
            //     $table->integer('id')->autoIncrement();
            //     $table->string('delito')->unique();
            //     $table->boolean('activo')->default(1);
            //     $table->timestamp('created_at')->useCurrent();
            //     $table->timestamp('updated_at')->useCurrent();
            // });

            Schema::create('tb_penaljuridico', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('numero_consecutivo',15);
                $table->string('carpeta_investigacion');
                $table->dateTime('fecha_asignacion');
                $table->string('agencia_mp',15);
                $table->integer('servidor_publico');      //Policia
                $table->string('denunciante',30)->nullable($value = false);
                $table->string('delito',50);
                $table->integer('poligono')->nullable($value = false); //Agrupacion
                $table->text('observaciones');
                $table->integer('estado_procesal');
                $table->boolean('activo')->default(1);
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
                $table->foreign('estado_procesal')->references('id')->on('tb_catestadosprocesales');
                // $table->foreign('delito')->references('id')->on('tb_catdelitos');
            });
        } catch (PDOException $er) {
            $this->down();
            throw $er;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_penaljuridico');
        // Schema::dropIfExists('tb_catdelitos');
    }
}
