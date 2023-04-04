<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuoteResponses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quote_responses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quote_id')->nullable();
            $table->integer('from_id')->nullable();
            $table->integer('to_id')->nullable();
            $table->string('flow')->nullable();
            $table->text('response')->nullable();
            $table->boolean('status')->default(1)->comment('0 = deactivate,1 = active');
            $table->integer('created_by')->unsigned();
            $table->integer('updated_by')->unsigned()->nullable();
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
        Schema::dropIfExists('quote_responses');
    }
}
