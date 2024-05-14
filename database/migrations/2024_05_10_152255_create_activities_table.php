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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->date('date_activities');
            $table->text('description');
            $table->string('state');
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
        Schema::dropIfExists('activities');
    }
};
