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
        Schema::create('provenance_records', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('artwork_id');
            $table->bigInteger('collection_id');
            $table->bigInteger('user_id');
            $table->timestamp('acquisition_date');
            $table->decimal('sale_price',11,2);
            $table->bigInteger('acquisition_method_id');
            $table->timestamp('transfer_date');
            $table->string('sale_location');
            $table->string('sale_address');
            $table->integer('owner_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('provenance_records');
    }
};
