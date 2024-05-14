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
        Schema::create('lost_reports', function (Blueprint $table) {
            $table->id();
            $table->string('departamento');
            $table->string('cargo');
            $table->string('destinatario');
            $table->string('descripcion');
            $table->date('date of foud');
            $table->string('photo');
            $table->foreignId('personals_id')
            ->constrained('personals')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
            $table->foreignId('rooms_id')
            ->constrained('rooms')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lost_reports');
    }
};
