<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CustomersRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class CustomersCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CustomersCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Customer::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/customers');
        CRUD::setEntityNameStrings('customers', 'customers');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('fname');
        CRUD::column('lname');
        CRUD::column('country');
        CRUD::column('city');
        CRUD::column('state');
        CRUD::column('email');
        CRUD::column('postal_code');
        CRUD::column('tel');
        
        
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
        CRUD::setValidation(CustomersRequest::class);

        CRUD::field('fname');
        CRUD::field('lname');
        CRUD::field('country_id');
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'state_id',
            'label'       => "State",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        CRUD::addField([ // select2_from_ajax: 1-n relationship
            'name'        => 'city_id',
            'label'       => "City",
            'type'        => 'select_from_array',
            'options'     => [],
            'allows_null' => false,
            'default'     => 'one',
        ]);
        // CRUD::field('state');
        // CRUD::field('city');
        CRUD::field('email');
        CRUD::field('postal_code');
        CRUD::field('tel');
        
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
