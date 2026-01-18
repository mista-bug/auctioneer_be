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
        Schema::create('artworks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artist_id')->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->bigInteger('owner_id')->nullable();
            $table->bigInteger('status_id')->nullable();
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->string('medium')->nullable();
            $table->longText('image_url')->nullable();
            $table->string('acquisition_source')->nullable();
            $table->decimal('estimate_low',11,2)->nullable();
            $table->decimal('estimate_high',11,2)->nullable();
            $table->decimal('starting_bid',11,2)->nullable();
            $table->decimal('reserve_price',11,2)->nullable();
            $table->integer('lot_number')->nullable();
            $table->date('artwork_created_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artworks');
    }
};
