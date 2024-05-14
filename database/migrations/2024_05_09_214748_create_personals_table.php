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
        Schema::create('personals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->integer('age');
            $table->date('birthdate');
            $table->integer('CI')-> unique();
            $table->string('sex');
            $table->text('email')-> unique();
            $table->integer('emergency_contac');
            
            $table->foreignId('positions_id')
            ->constrained('positions')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personals');
    }
};
