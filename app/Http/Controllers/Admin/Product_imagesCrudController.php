<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Product_imagesRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class Product_imagesCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class Product_imagesCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Product_images::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/product_images');
        CRUD::setEntityNameStrings('product_images', 'product_images');
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
//        $this->crud->addColumn([
//            // 1-n relationship
//            'label'          => 'Product ID',
//            'type'           => 'text',
//            'name'           => 'product_id'
//        ]);
        $this->crud->addColumn([
            // 1-n relationship
            'label'          => 'Product ID', // Table column heading
            'type'           => 'number',
            'name'           => 'product_id',
            'visibleInTable' => true,
            'visibleInModal' => false,
        ]);
        $this->crud->addColumn([
            // 1-n relationship
            'label'          => 'Product', // Table column heading
            'type'           => 'select',
            'name'           => 'product_id', // the column that contains the ID of that connected entity;
            'key'            => 'product_dmm',
            'entity'         => 'product', // the method that defines the relationship in your Model
            'attribute'      => 'name',// foreign key attribute that is shown to user
            'visibleInTable' => true,
            'visibleInModal' => false,
        ]);
        $this->crud->addColumn([
        // 1-n relationship
        'label'          => 'Images', // Table column heading
        'type'           => 'image',
        'name'           => 'path',
        'height'         => '100px',
        'width'          => '100px',
        ]);

        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive']
            // optionally override the Yes/No texts
        ]);
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
        CRUD::setValidation(Product_imagesRequest::class);

        CRUD::addField([  // Select2
            'label'     => 'Product',
            'type'      => 'select_product',
            'name'      => 'product_id', // the db column for the foreign key
            'entity'    => 'product', // the method that defines the relationship in your Model
            'attribute' => 'name', // foreign key attribute that is shown to user
            // 'wrapperAttributes' => [
            //     'class' => 'form-group col-md-6'
            //   ], // extra HTML attributes for the field wrapper - mostly for resizing field
        ]);
        $this->crud->addField([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive']
            // optionally override the Yes/No texts
        ]);

        $this->crud->addField([
            'label' => "Product Image",
            'name' => "path",
            'type' => 'image',
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0, // ommit or set to 0 to allow any aspect ratio
            // 'disk'      => 's3_bucket', // in case you need to show images from a different disk
            // 'prefix'    => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
        ]);

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
            // 1-n relationship
            'label'          => 'Product', // Table column heading
            'type'           => 'select',
            'name'           => 'product_id', // the column that contains the ID of that connected entity;
            'entity'         => 'product', // the method that defines the relationship in your Model
            'attribute'      => 'name',// foreign key attribute that is shown to user
        ]);
        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Status',
            'type'  => 'boolean',
            'options' => [1 => 'Active', 0 => 'Inactive']
            // optionally override the Yes/No texts
        ]);
        $this->crud->addColumn([
            // 1-n relationship
            'label'          => 'Images', // Table column heading
            'type'           => 'image',
            'name'           => 'path',
            'height'         => '100px',
            'width'          => '100px',
        ]);

        // $this->crud->removeColumn('date');
        // $this->crud->removeColumn('extras');
    }
}
