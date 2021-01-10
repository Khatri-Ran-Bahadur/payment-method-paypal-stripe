<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
        * This is simple migration  not defined any rule for database and any relationship
        * And i can not use normalization of this table
        */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('plant_id')->unsigned();
            $table->string('company_name_vendor_name');
            $table->string('street');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->string('pin');
            $table->string('country');
            $table->string('contact_person_name');
            $table->string('tel_no');
            $table->string('mobile_no');
            $table->string('email')->unique();            
            $table->string('industry_type');
            $table->string('located');
            $table->string('address_proof')->nullable();
            $table->string('registration_certificate')->nullable();
            $table->string('copy_pan_card')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
