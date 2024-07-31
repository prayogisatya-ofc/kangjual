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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('excerpt');
            $table->text('description');
            $table->string('thumbnail');
            $table->json('gallery');
            $table->integer('price')->default(0);
            $table->boolean('is_free');
            $table->boolean('is_published');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->string('file');
            $table->enum('type', ['project', 'template']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
