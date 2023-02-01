<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruckDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driver_name')->nullable();
            $table->string('driver_email')->nullable();
            $table->string('driver_phone')->nullable();
            $table->string('driver_alter_phone')->nullable();
            $table->string('driving_licence')->nullable();
            $table->string('licence_exp_date')->nullable();
            $table->text('licence_doc')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->text('aadhar_card_doc')->nullable();
            $table->text('driver_address')->nullable();
            $table->integer('status')->default(1);
            $table->string('added_by')->nullable();
            $table->string('added_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('truck_drivers');
    }
}
