<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthFacilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facilities', function (Blueprint $table) {
       
            $table->increments('id');
            $table->integer('ward_id')->nullable();
            $table->unsignedInteger('facility_manager_id')->nullable();
            $table->string('global_id')->unique();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('lga_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('type')->nullable();
            $table->string('ward_code')->nullable();
            $table->string('ward_name')->nullable();
            $table->string('alternate_name')->nullable();
            $table->string('functional_status')->nullable();
            $table->string('ri_service_status')->nullable();
            $table->string('lga_code')->nullable();
            $table->string('state_code')->nullable();        
            $table->string('status')->nullable();
            $table->string('ownership')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->text('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instragram')->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('health_facilities');
    }
}
