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
        Schema::create('ferrys', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->string("photo");
            $table->float("longueur");
            $table->float("largeur");
            $table->float("vitesse");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferrys');
    }
};
