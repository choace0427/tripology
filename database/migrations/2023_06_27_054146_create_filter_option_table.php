<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilterOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filter_option', function (Blueprint $table) {
            $table->increments('id');
            $table->text('filter_name');
            $table->text('filter_type');
            $table->text('filter_slug');
            $table->timestamps();
        });

        DB::table('filter_option')->insert([
            ['filter_name' => 'Apartment', 'filter_type' => 'accomodation', 'filter_slug' => 'apartment'],
            ['filter_name' => 'Hostel', 'filter_type' => 'accomodation', 'filter_slug' => 'hostel'],
            ['filter_name' => 'Vocation Role', 'filter_type' => 'accomodation', 'filter_slug' => 'vocation role'],
            ['filter_name' => 'less than 1 km', 'filter_type' => 'distance', 'filter_slug' => '1km'],
            ['filter_name' => 'less than 3 km', 'filter_type' => 'distance', 'filter_slug' => '3km'],
            ['filter_name' => 'less than 5 km', 'filter_type' => 'distance', 'filter_slug' => '5km'],
            ['filter_name' => 'more than 5 km', 'filter_type' => 'distance', 'filter_slug' => '10km'],
            ['filter_name' => '0-3 days', 'filter_type' => 'duration', 'filter_slug' => '0-3days'],
            ['filter_name' => '4-5 days', 'filter_type' => 'duration', 'filter_slug' => '0-4days'],
            ['filter_name' => '6-7 days', 'filter_type' => 'duration', 'filter_slug' => '6-7days'],
            ['filter_name' => '8-9 days', 'filter_type' => 'duration', 'filter_slug' => '8-9days'],
            ['filter_name' => '10+ days', 'filter_type' => 'duration', 'filter_slug' => 'over10days'],
            ['filter_name' => '$0-$100', 'filter_type' => 'price', 'filter_slug' => '$0-$100'],
            ['filter_name' => '$100-$500', 'filter_type' => 'price', 'filter_slug' => '$100-$500'],
            ['filter_name' => '$500-$1000', 'filter_type' => 'price', 'filter_slug' => '$500-$1000'],
            ['filter_name' => '$1000+', 'filter_type' => 'price', 'filter_slug' => 'over $1000'],
            ['filter_name' => 'Solo Traveller', 'filter_type' => 'traveller_type', 'filter_slug' => 'solo'],
            ['filter_name' => 'Family', 'filter_type' => 'traveller_type', 'filter_slug' => 'family'],
            ['filter_name' => 'Couple', 'filter_type' => 'traveller_type', 'filter_slug' => 'couple'],
            ['filter_name' => 'Group', 'filter_type' => 'traveller_type', 'filter_slug' => 'group'],
            ['filter_name' => 'star 1', 'filter_type' => 'rating', 'filter_slug' => 'star1'],
            ['filter_name' => 'star 2', 'filter_type' => 'rating', 'filter_slug' => 'star2'],
            ['filter_name' => 'star 3', 'filter_type' => 'rating', 'filter_slug' => 'star3'],
            ['filter_name' => 'star 4', 'filter_type' => 'rating', 'filter_slug' => 'star4'],
            ['filter_name' => 'star 5', 'filter_type' => 'rating', 'filter_slug' => 'star5'],
            ['filter_name' => 'Flight', 'filter_type' => 'transposition', 'filter_slug' => 'flight'],
            ['filter_name' => 'Train', 'filter_type' => 'transposition', 'filter_slug' => 'train'],
            ['filter_name' => 'Bus', 'filter_type' => 'transposition', 'filter_slug' => 'bus'],
            ['filter_name' => 'Car', 'filter_type' => 'transposition', 'filter_slug' => 'car'],
            ['filter_name' => 'Boat', 'filter_type' => 'transposition', 'filter_slug' => 'boat'],
            ['filter_name' => 'Hanoi', 'filter_type' => 'combine', 'filter_slug' => 'hanoi'],
            ['filter_name' => 'Siem Reap', 'filter_type' => 'combine', 'filter_slug' => 'siem_reap'],
            ['filter_name' => 'Hoi An', 'filter_type' => 'combine', 'filter_slug' => 'hoi_an'],
            ['filter_name' => 'Da Nang', 'filter_type' => 'combine', 'filter_slug' => 'da_nang'],
            ['filter_name' => 'Sapa', 'filter_type' => 'combine', 'filter_slug' => 'sapa'],
            ['filter_name' => 'Phnom Penh', 'filter_type' => 'combine', 'filter_slug' => 'phnom_penh'],
            ['filter_name' => 'Ho Chi Minh City', 'filter_type' => 'combine', 'filter_slug' => 'ho chi minh city'],
            ['filter_name' => 'Halong Bay', 'filter_type' => 'combine', 'filter_slug' => 'halong bay'],
            ['filter_name' => 'Hue', 'filter_type' => 'combine', 'filter_slug' => 'hue'],
            ['filter_name' => 'Nha Trang', 'filter_type' => 'combine', 'filter_slug' => 'nha trang'],
            ['filter_name' => 'Mekong Delta', 'filter_type' => 'combine', 'filter_slug' => 'mekong delta'],
            ['filter_name' => 'Ninh Binh', 'filter_type' => 'combine', 'filter_slug' => 'ninh binh'],
            ['filter_name' => 'Mai Chau', 'filter_type' => 'combine', 'filter_slug' => 'mai chau'],
            ['filter_name' => 'Dong Hoi', 'filter_type' => 'combine', 'filter_slug' => 'dong hoi'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('filter_option');
    }
}