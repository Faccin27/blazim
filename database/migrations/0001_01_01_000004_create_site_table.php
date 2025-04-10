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
        Schema::create('site', function (Blueprint $table) {
            $table->id();
            $table->text('keywords');
            $table->text('description');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('email');
            $table->string('telefone', 50);
            $table->string('whatsapp', 16);
            $table->text('endereco');
            $table->string('mapa', 500);
            $table->text('codigos_head')->nullable();
            $table->text('codigos_body')->nullable();
            $table->text('codigos_footer')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site');
    }
};
