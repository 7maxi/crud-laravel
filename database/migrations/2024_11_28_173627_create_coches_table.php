<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
public function up()
{
    Schema::create('coches', function (Blueprint $table) {
        $table->id();
        $table->string('marca', 50);
        $table->string('modelo', 50);
        $table->integer('anio');
        $table->decimal('precio', 10, 2)->nullable();
        $table->string('color', 20)->nullable();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coches');
    }
};
