<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrucksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->id();
            $table->string('truck_type')->nullable();
            $table->string('truck_no')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('register_no')->nullable();
            $table->string('register_exp_date')->nullable();
            $table->text('register_doc')->nullable();
            $table->string('national_permit_no')->nullable();
            $table->text('national_permit_exp_date')->nullable();
            $table->text('national_permit_doc')->nullable();
            $table->string('punjab_permit_no')->nullable();
            $table->string('punjab_exp_date')->nullable();
            $table->text('punjab_permit_doc')->nullable();
            $table->string('insurance_no')->nullable();
            $table->text('insurance_exp_date')->nullable();
            $table->text('insurance_doc')->nullable();

            $table->string('polution_no')->nullable();
            $table->string('polution_exp_date')->nullable();
            $table->text('polution_doc')->nullable();
            $table->string('pan_card_no')->nullable();
            $table->text('pan_card_doc')->nullable();
            $table->text('affidavit_no')->nullable();
            $table->text('affidavit_doc')->nullable();

            $table->text('bank_name')->nullable();
            $table->text('account_no')->nullable();
            $table->text('ifsc_no')->nullable();
            $table->integer('status')->default(1);
            $table->string('added_date')->nullable();
            $table->string('added_by')->nullable();
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
        Schema::dropIfExists('trucks');
    }
}
