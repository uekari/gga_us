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
        Schema::create('carestations', function (Blueprint $table) {
            $table->id('carestation_id');
            $table->string('carestation_name');
            $table->string('address');
            $table->string('tel');
            $table->string('fax');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carestations');
    }
};
