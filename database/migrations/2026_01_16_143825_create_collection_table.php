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
        Schema::create('collections',function (Blueprint $table) {
            $table->id();
            $table->string('event_id');
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('location');
            $table->string('address');
            $table->longText('description');
            $table->bigInteger('organizer_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('collections');
    }
};
