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
        Schema::table('templates', function (Blueprint $table) {
            $table->string('image_url')->default(
                'https://source.unsplash.com/random/800x600');
        });}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
