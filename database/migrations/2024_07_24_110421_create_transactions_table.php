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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->unique();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->integer('down_avail');
            $table->enum('status', ['pending', 'payed', 'canceled']);
            $table->string('buyer_name');
            $table->string('email');
            $table->text('reason')->nullable();
            $table->string('redirect_url')->nullable();
            $table->string('download_token')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
