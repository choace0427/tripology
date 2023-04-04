<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AffiliatesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class AffiliatesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class AffiliatesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Affiliate::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/affiliates');
        CRUD::setEntityNameStrings('affiliates', 'affiliates');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('name');
        CRUD::column('email');
        // CRUD::column('password');
        CRUD::column('country_id');
        CRUD::column('state_id');
        CRUD::column('city_id');
        CRUD::column('company_name');
        CRUD::column('brand_logo');
        CRUD::column('website');
        CRUD::column('phone');
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
        CRUD::setValidation(AffiliatesRequest::class);

        CRUD::field('name');
        CRUD::field('email');
        // CRUD::field('password');
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
        // CRUD::field('state_id');
        // CRUD::field('city_id');
        CRUD::field('company_name');
        // CRUD::field('brand_logo');
        CRUD::addField([   // Upload
            'name'      => 'brand_logo',
            'label'     => 'Brand Logo',
            'type'      => 'upload',
            'upload'    => true,
            // 'disk'      => 'afBrands', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);
        CRUD::field('website');
        CRUD::field('phone');
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
