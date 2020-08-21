<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes



    //Route::crud('tag', 'TagCrudController');
    Route::crud('news', 'NewsCrudController');
    Route::crud('products', 'ProductsCrudController');
    Route::crud('categories', 'CategoriesCrudController');
    Route::crud('product_images', 'Product_imagesCrudController');
    Route::crud('orderlist', 'OrderlistCrudController');
    Route::crud('orderlistproduct', 'OrderListProductCrudController');
}); // this should be the absolute last line of this file