<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->id();
            $table->string('property_name');
            $table->string('block_name');
            $table->string('unit_number')->unique();
            $table->string('unit_type')->nullable();
            $table->unsignedInteger('land_area')->nullable();
            $table->unsignedInteger('building_area')->nullable();
            $table->unsignedTinyInteger('bedrooms')->default(2);
            $table->unsignedTinyInteger('bathrooms')->default(1);
            $table->decimal('price', 15, 2)->default(0);
            $table->decimal('booking_fee', 15, 2)->nullable();
            $table->enum('status', [
                'available',
                'booked',
                'sold',
                'occupied',
                'maintenance',
                'handover',
            ])->default('available');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('units');
    }
}