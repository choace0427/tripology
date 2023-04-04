<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\LeadsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class LeadsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class LeadsCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Leads::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/leads');
        CRUD::setEntityNameStrings('leads', 'leads');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('customer_id');
        // CRUD::column('travel_from_locality');
        CRUD::column('travel_from_city');
        // CRUD::column('travel_from_state');
        CRUD::column('travel_from_country');
        // CRUD::column('travel_to_locality');
        CRUD::column('travel_to_city');
        // CRUD::column('travel_to_state');
        CRUD::column('travel_to_country');
        CRUD::column('travel_start_date');
        CRUD::column('travel_end_date');
        CRUD::column('travel_type');
        CRUD::column('travel_budget');
        // CRUD::column('travel_desc');
        // CRUD::column('passenger_cnt_adult');
        // CRUD::column('passenger_cnt_minor');
        // CRUD::column('passenger_minor_age');
        // CRUD::column('passenger_special_needs');
        CRUD::column('max_responses');
        // CRUD::column('status');
        // CRUD::column('created_by');
        // CRUD::column('updated_by');
        // CRUD::column('created_at');
        // CRUD::column('updated_at');
        // CRUD::column('deleted_at');

        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(LeadsRequest::class);

        CRUD::field('customer_id');
        CRUD::field('travel_from_locality');
        // CRUD::field('travel_from_city_id');
        // CRUD::field('travel_from_state_id');
        CRUD::field('travel_from_country_id');
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'travel_from_state_id',
            'label'       => "Travel from State",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'travel_from_city_id',
            'label'       => "Travel from city",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        CRUD::field('travel_to_locality');
        // CRUD::field('travel_to_city_id');
        // CRUD::field('travel_to_state_id');
        CRUD::field('travel_to_country_id');
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'travel_to_state_id',
            'label'       => "Travel to State",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'travel_to_city_id',
            'label'       => "Travel to city",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        CRUD::field('travel_start_date');
        CRUD::field('travel_end_date');
        CRUD::field('travel_type');
        CRUD::field('travel_budget');
        CRUD::field('travel_desc');
        CRUD::field('passenger_cnt_adult');
        CRUD::field('passenger_cnt_minor');
        CRUD::field('passenger_minor_age');
        CRUD::field('passenger_special_needs');
        CRUD::field('max_responses');
        // CRUD::field('status');
        // CRUD::field('created_by');
        // CRUD::field('updated_by');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
        Widget::add()->type('script')->content('assets/js/trip.js');
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
