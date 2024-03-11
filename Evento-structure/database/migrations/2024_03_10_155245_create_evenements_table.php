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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->string('date');
            $table->text('lieu');
            $table->integer('Number_places');
            $table->foreignId('organisateur_id')->constrained('users');
            $table->foreignId('category_id')->constrained('categories');
            $table->enum('status' , ['forbiden' , 'public'])->default('forbiden');
            $table->enum('method' , ['auto' , 'manuel'])->default('auto');
            $table->binary('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
