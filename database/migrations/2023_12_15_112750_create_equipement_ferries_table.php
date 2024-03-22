<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

        Schema::create('equipement_ferries', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ferry_id');
            $table->foreign('ferry_id')->references('id')->on('ferrys')->onDelete('cascade');

            $table->unsignedBigInteger('equipement_id');
            $table->foreign('equipement_id')->references('id')->on('equipements')->onDelete('cascade');
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::dropIfExists('equipement_ferries');
    }
};

