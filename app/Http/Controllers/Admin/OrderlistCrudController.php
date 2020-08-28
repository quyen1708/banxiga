<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderlistRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class OrderlistCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderlistCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
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
        CRUD::setModel(\App\Models\Orderlist::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/orderlist');
        CRUD::setEntityNameStrings('orderlist', 'orderlists');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {

        CRUD::filter('select_from_array')
            ->type('dropdown')
            ->label('Tình trạng đơn hàng')
            ->values(['0' => 'Đơn hàng mới', '1' => 'Đang xử lý', '2' => 'Đã hoàn thành'])
            ->whenActive(function ($value) {
                CRUD::addClause('where', 'status', $value);
            });

        CRUD::column('id')->type('number');
        ;
        $this->crud->addColumn([
            'name'  => 'cus_name',
            'label' => 'Customer Name',
            'type'  => 'text',
        ]);

        $this->crud->addColumn([
            'name'  => 'cus_email',
            'label' => 'Customer Email',
            'type'  => 'email',
        ]);

        $this->crud->addColumn([
            'name'  => 'cus_phone',
            'label' => 'Phone Number',
            'type'  => 'phone',
        ]);

        $this->crud->addColumn([
            'name'  => 'cus_address',
            'label' => 'Address',
            'type'  => 'text',
        ]);

        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Trạng Thái',
            'type' => 'radio',
            'options'     => [
                0 => 'Chưa xử lý',
                1 => 'Đang xử lý',
                2 => 'Đã hoàn thành'
            ],
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
        CRUD::setValidation(OrderlistRequest::class);

        $this->crud->addField([
            'name'            => 'status',
            'label'           => "Trạng thái đơn hàng",
            'type'            => 'select_from_array',
            'options'     => [
                0 => 'Chưa xử lý',
                1 => 'Đang xử lý',
                2 => 'Đã hoàn thành'
            ],
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
    protected function setupShowOperation()
    {
        $this->crud->set('show.setFromDb', false);

        $this->crud->addColumn([
            'label'          => 'Customer name', // Table column heading
            'type'           => 'text',
            'name'           => 'cus_name', // the column that contains the ID of that connected entity;
        ]);
        $this->crud->addColumn([
            'name'  => 'cus_email',
            'label' => 'Customer Email',
            'type'  => 'email',
        ]);
        $this->crud->addColumn([
            'name'  => 'cus_phone',
            'label' => 'Phone Number',
            'type'  => 'phone',
        ]);
        $this->crud->addColumn([
            'name'  => 'cus_address',
            'label' => 'Address',
            'type'  => 'text',
        ]);

        $this->crud->addColumn([
            'label'          => 'Các sản phẩm', // Table column heading
            'type'           => 'status_order',
            'entity'         => 'OrderListProduct', // the method that defines the relationship in your Model
        ]);
        $this->crud->addColumn([
            'name'           => 'payment',
            'label'          => 'Tổng thanh toán', // Table column heading
            'type'           => 'payment',

        ]);

        $this->crud->addColumn([
            'name'  => 'status',
            'label' => 'Trạng Thái',
            'type' => 'radio',
            'options'     => [
                0 => 'Chưa xử lý',
                1 => 'Đang xử lý',
                2 => 'Đã hoàn thành'
            ],
        ]);

    }

    protected function addCustomCrudFilters()
    {
    }

    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

}
