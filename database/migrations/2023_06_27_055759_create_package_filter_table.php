<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackageFilterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_filter', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id');
            $table->integer('filter_id');
            $table->timestamps();
        });

        DB::table('groups')->insert([
            ['package_id' => '23', 'filter_id' => '3'],
            ['package_id' => '23', 'filter_id' => '28'],
            ['package_id' => '23', 'filter_id' => '1'],
            ['package_id' => '23', 'filter_id' => '15'],
            ['package_id' => '23', 'filter_id' => '10'],
            ['package_id' => '23', 'filter_id' => '6'],
            ['package_id' => '24', 'filter_id' => '2'],
            ['package_id' => '24', 'filter_id' => '28'],
            ['package_id' => '24', 'filter_id' => '4'],
            ['package_id' => '24', 'filter_id' => '13'],
            ['package_id' => '24', 'filter_id' => '26'],
            ['package_id' => '24', 'filter_id' => '6'],
            ['package_id' => '26', 'filter_id' => '2'],
            ['package_id' => '26', 'filter_id' => '28'],
            ['package_id' => '26', 'filter_id' => '3'],
            ['package_id' => '26', 'filter_id' => '19'],
            ['package_id' => '26', 'filter_id' => '23'],
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('package_filter');
    }
}