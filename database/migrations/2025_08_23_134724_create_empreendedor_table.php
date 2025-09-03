<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('empreendedors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('colaborator_id');
            $table->string('logomarca', 150);
            $table->string('phone', 12);
            $table->string('address', 200);
            $table->string('number',);
            $table->string('bairro', 100);
            $table->string('cidade', 45);
            $table->string('cep', 9);
            $table->timestamps();
        });

        Schema::create('atendimento', function (Blueprint $table) {
            $table->foreignId('empreendedor_id')->index();
            $table->foreignId('horarios_id')->index();
            $table->string('token');
            $table->string('name');
            $table->string('preco');
            $table->timestamps();
        });

        Schema::create('horarios', function (Blueprint $table) {
            $table->foreignId('empreendedor_id')->index();
            $table->id();
            $table->string('data_atendimento');
            $table->string('hora_atendimento');
            $table->boolean('active');
            $table->string('nome', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empreendedors');
        Schema::dropIfExists('atendimento');
        Schema::dropIfExists('horarios');
    }
};
