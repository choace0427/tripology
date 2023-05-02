<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travellers', function (Blueprint $table) {
            $table->id();
            $table->string('traveller_name');
            $table->string('traveller_email');
            $table->string('traveller_phone')->nullable();
            $table->string('traveller_country')->nullable();
            $table->text('traveller_address')->nullable();
            $table->string('traveller_state')->nullable();
            $table->string('traveller_city')->nullable();
            $table->string('traveller_zip')->nullable();
            $table->text('traveller_password');
            $table->text('traveller_token');
            $table->string('traveller_status')->default('Pending');
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
        Schema::dropIfExists('travellers');
    }
}
