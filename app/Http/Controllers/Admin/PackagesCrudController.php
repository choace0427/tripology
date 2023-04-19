<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PackagesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;
use App\Models\PackageMeta;
use Illuminate\Http\Request;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use App\Models\PackageImages;

/**
 * Class PackagesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PackagesCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{ store as traitStore; }
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
        
        /* CRUD::addField([   // Textarea
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'textarea'
        ]);*/

        CRUD::addField([   // Upload
            'name'      => 'featured_image',
            'label'     => 'Featured Image',
            'type'      => 'upload',
            'upload'    => true,
            'disk'      => 'uploads', // if you store files in the /public folder, please omit this; if you store them in /storage or S3, please specify it;
        ]);

        // using this to get id from url
        // $entry =$this->crud->getCurrentEntry();
        // $id=$entry->id;
        $id=(int)request()->segment(3);
        //$id = $this->get('id') ?? request()->route('id');
        $results = DB::select("select * from package_meta where package_id = $id");
        $additionalInfo=json_encode($results); 

        CRUD::addField([   // Hidden
            'name'  => 'additionalInfo',
            'attributes'  => ['id' => 'additionalInfo'],
            'default' => $additionalInfo,
            'type'  => 'hidden',
            //'fake'     => true,
            'value' => '1',
        ]);


        CRUD::field('package_meta_separator')->type('custom_html')->value('<h5 class="text-center">#Package Meta</h5><hr>');

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
  
        //$id=$this->crud->entry->id;

        Widget::add()->type('script')->content('assets/js/trip.js');
        // if ($_SERVER['REQUEST_METHOD']==='POST') {
        //  //   CRUD::setModel(\App\Models\PackageMeta::class);
        //  //   meta::setdata($v1,$v2)
       
       
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
        //execute the FormRequest authorization and validation, if one is required
        $request = $this->crud->validateRequest();
        $response = $this->traitStore();
        $arr = $_POST;
        $metaArr = [];
        // in case we add package meta 

        if (array_key_exists('packageMeta', $arr)) {

            foreach ($arr['packageMeta'] as $key => $value) {
                $metaArr[$key] = $value;
            }
            foreach ($metaArr as $key => $val) {
                if ($val['type'] != 'image') {
                    $new = new PackageMeta();
                    $arrVal = array_values($val);
                    $new->package_id = $this->crud->entry->id;
                    $new->type = $arrVal[0];
                    $new->name = $arrVal[1];
                    $new->value = $arrVal[2];
                    $new->save();
                } else {
                    $arrVal = array_values($val);
                    $disk = "public";
                    $destination_path = "/uploads/packageImages";
                    $file = $request->file('img');

                    foreach ($file as $pmImg => $v) {
                        $new = new PackageImages();
                        $new->package_id = $this->crud->entry->id;
                        $new->type = 'image';
                        $new->name = $arrVal[1];
                        //$new->uploadFileToDisk($v,$attribute_name, $disk, $destination_path, $fileName = null);
                        $filename = date('YmdHi') . $v->getClientOriginalName();
                        $v->move(public_path('storage/app/public'), $filename);
                        $new->value = (string)$filename;
                        $new->save();
                        //$results = DB::insert('insert into  package_images (package_id,type,name,value) values (?,?,?,?)',[$id,'image',$arrVal[1],'']);
                    }
                }
            }
        }
        //  $data_r = $this->crud->getStrippedSaveRequest($request);
        // if ($request->file('packageMeta')) {
        //     $disk = "public";
        //     $destination_path = "/uploads/packageImages";
        //     foreach($request->file('packageMeta') as $pmImg) {
        //         $file = $pmImg['img'];
        //         $md5Name = md5_file($file->getRealPath());
        //         $guessExtension = $file->guessExtension();
        //         $file = $file->storeAs($destination_path, $md5Name.'.'.$guessExtension, $disk);
        //         dd($file);
        //     }
        // }
        //dd($arr);die;
        return $response;
    }
}
