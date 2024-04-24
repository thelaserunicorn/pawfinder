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
        Schema::create('send_reqs', function (Blueprint $table) {
           $table->id();
            $table->string('name');
            $table->string('email');
            $table->integer('animal_id');
            $table->string('animal_name');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('send_reqs');
    }
};
