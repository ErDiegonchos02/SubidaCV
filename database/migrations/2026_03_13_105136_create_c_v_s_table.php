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
    Schema::create('cvs', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->unique()->constrained()->onDelete('cascade');
        $table->string('nombre_archivo');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('cvs');
}

};
