<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbRecursoshumanoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try{
            Schema::create('tb_catestadosprocesales', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->string('nombre');
                $table->boolean('activo');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
                // $table->primary('id');
            });

            Schema::create('tb_reprecursoshumanos', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->text('queja');
                $table->datetime('fecha_recepcion');
                $table->integer('abogados');
                $table->integer('estado_procesal');
                $table->text('asunto');
                $table->text('derecho_violado');
                $table->boolean('activo');
                $table->timestamp('created_at')->useCurrent();
                $table->timestamp('updated_at')->useCurrent();
                $table->foreign('estado_procesal')->references('id')->on('tb_catestadosprocesales');
                // $table->primary('id');
            });

            DB::table('tb_catestadosprocesales')->insert([
                ['nombre' => 'Investigación', 'activo' => true],
                ['nombre' => 'Integración', 'activo' => true],
                ['nombre' => 'Periodo aprobatorio', 'activo' => true],
                ['nombre' => 'Informa de ley', 'activo' => true],
            ]);
        } catch(PDOException $ex){
            $this->down();
            throw $ex;
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_reprecursoshumanos');
        Schema::dropIfExists('tb_catestadosprocesales');
    }
}
