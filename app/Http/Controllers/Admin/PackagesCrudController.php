<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PackagesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

/**
 * Class PackagesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PackagesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Package::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/packages');
        CRUD::setEntityNameStrings('packages', 'packages');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('title');
        CRUD::column('slug');
        // CRUD::column('description');
        // CRUD::column('short_description');
        CRUD::column('category_id');
        CRUD::column('affiliate_id');
        CRUD::column('destination_id');
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
        CRUD::setValidation(PackagesRequest::class);

        CRUD::field('title');
        CRUD::addField([
            'name' => 'slug',
            'type' => 'text',
            'attributes' => [
                'readonly' => 'readonly',
              ],
        ]);
        CRUD::field('short_description');
        // CRUD::field('description');
        CRUD::addField([   // Summernote
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'summernote',
            'options' => [],
        ]);
        CRUD::field('category_id');
        CRUD::field('affiliate_id');
        CRUD::field('destination_id');
        // CRUD::field('status');
        // CRUD::field('created_by');
        // CRUD::field('updated_by');

        CRUD::addField([   // Hidden
            'name'  => 'additionalInfo',
            'attributes'  => ['id' => 'additionalInfo'],
            'type'  => 'hidden',
            'value' => 'active',
        ]);

        /* CRUD::addField([   // Textarea
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'textarea'
        ]);

        CRUD::addField([   // Upload
            'name'      => 'image',
            'label'     => 'Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
            // optional:
            'temporary' => 10 // if using a service, such as S3, that requires you to make temporary URLs this will make a URL that is valid for the number of minutes specified
        ]); */

CRUD::field('package_meta_separator')->type('custom_html')->value('<h5 class="text-center">#Package Meta</h5><hr>');

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

    public function update()
    {
        $this->crud->hasAccessOrFail('update');
        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();
        $data_r = $this->crud->getStrippedSaveRequest($request);
    }

    public function store()
    {
        $this->crud->hasAccessOrFail('create');
        // execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();
        $data_r = $this->crud->getStrippedSaveRequest($request);
        dd($data_r); die;
    }
}
