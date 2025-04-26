<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pest_management', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pest_id')->constrained()->onDelete('cascade');
            $table->foreignId('crop_id')->constrained()->onDelete('cascade');
            $table->text('management_strategy');
            $table->text('chemical_control')->nullable();
            $table->text('biological_control')->nullable();
            $table->text('cultural_control')->nullable();
            $table->text('preventive_measures');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pest_management');
    }
}; 