<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use Illuminate\Database\Seeder;
use App\Models\States;
use App\Models\Cities;
use App\Models\Countries;

class CountrySateCitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*------------------------------------------
        --------------------------------------------
        load Country
        --------------------------------------------
        --------------------------------------------*/
        /* $countries = Helper::callCurlRequest('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/countries.json');
        $countries = json_decode($countries, true);
        foreach ($countries['countries'] as $key => $country) {
            Countries::create([
                'name' => $country['name'],
                'slug' => str_slug($country['name']),
                'shortname' => $country['sortname'],
                'phone_code' => $country['phoneCode']
            ]);
        } */

        /* $states = Helper::callCurlRequest('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/states.json');
        $states = json_decode($states, true);
        foreach ($states['states'] as $key => $state) {
            States::create([
                'name' => $state['name'],
                'slug' => str_slug($state['name']),
                'country_id' => $state['country_id']
            ]);
        } */

        /* $cities = Helper::callCurlRequest('https://raw.githubusercontent.com/hiiamrohit/Countries-States-Cities-database/master/cities.json');
        $cities = json_decode($cities, true);
        foreach ($cities['cities'] as $key => $city) {
            Cities::create([
                'name' => $city['name'],
                'slug' => str_slug($city['name']),
                'state_id' => (int)$city['state_id']
            ]);
        } */
    }
}
