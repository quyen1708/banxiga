<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProductsRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProductsCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProductsCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Products::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/products');
        CRUD::setEntityNameStrings('products', 'products');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('id')->type('number');
        $this->crud->addColumn([
            // 1-n relationship
            'label'          => 'Category', // Table column heading
            'type'           => 'select',
//            'name'           => 'category_id', // the column that contains the ID of that connected entity;
            'entity'         => 'category', // the method that defines the relationship in your Model
            'attribute'      => 'name', // foreign key attribute that is shown to user
            'visibleInTable' => true,
            'visibleInModal' => false,
        ]);
        CRUD::column('name')->type('text');
        CRUD::column('price')->type('number');
        CRUD::column('amont')->type('number');
        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            // optionally override the Yes/No texts
        ]);
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */
    }

    protected function setDetailsRowView()
    {

    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(ProductsRequest::class);
        CRUD::addField([  // Select2
            'label'     => "Category",
            'type'      => 'select',
            'name'      => 'category_id', // the db column for the foreign key
            'entity'    => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'tab' => 'Info',
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing field
        ]);
       /* CRUD::addField([  // Select2
            'label'     => "Upload Images",
            'type'      => 'select',
            'name'      => 'category_id', // the db column for the foreign key
            'entity'    => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            'tab' => 'Info',
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing field
        ]);*/
        CRUD::field('name')->type('text')->tab('Info');
        CRUD::addField([
            'name'  => 'description',
            'label' => 'Description',
            'type'  => 'ckeditor',
            'tab' => 'Info',
        ]);
        CRUD::field('price')->type('number')->tab('Info');
        CRUD::field('amont')->type('text')->tab('Info');
        $this->crud->addField([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            'default' => '1',
            // optionally override the Yes/No texts
            'tab' => 'Info',
        ]);
//        CRUD::field([
//            'name'      => 'product_id', // the db column for the foreign key
//            'entity'    => 'product', // the method that defines the relationship in your Model
//            'type' => 'image',
//            'label'        => 'Image - includes cropping',
//            'upload'       => true,
//            'crop'         => true, // set to true to allow cropping, false to disable
//            'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
//            // 'disk' => config('backpack.base.root_disk_name'), // in case you need to show images from a different disk
//            // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
//            'tab' => 'Uploads',
//        ]);

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
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

    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([
            'label'     => "Category",
            'type'      => 'select',
            'entity'    => 'category', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn('name');
        $this->crud->addColumn([
            'label' => 'Description',
            'name' => 'description',
            'type' => 'markdown',
        ]);
        $this->crud->addColumn('price');
        $this->crud->addColumn('amont');
        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive'],
            'default' => '1',
        ]);
        $this->crud->addColumn('display_order');
        $this->crud->addColumn([
            'label'          => 'Images', // Table column heading
            'type'           => 'demo',
            'entity'         => 'images', // the method that defines the relationship in your Model
            'attribute'      => 'path',
        ]);
        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }

}
