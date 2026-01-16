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
            $table->bigInteger('artist_id');
            $table->bigInteger('category_id');
            $table->bigInteger('owner_id');
            $table->bigInteger('status_id');
            $table->string('title');
            $table->string('description');
            $table->integer('width');
            $table->integer('height');
            $table->string('medium');
            $table->longText('image_url');
            $table->string('acquisition_source');
            $table->decimal('estimate_low',11,2);
            $table->decimal('estimate_high',11,2);
            $table->decimal('starting_bid',11,2);
            $table->decimal('reserve_price',11,2);
            $table->integer('lot_number');
            $table->date('artwork_created_at');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artwork');
    }
};
