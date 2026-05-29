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
        Schema::create('_online_publishings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('document_name');
            $table->string('author_Firstname');
            $table->string('author_Lastname');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_publishings');
    }
};
