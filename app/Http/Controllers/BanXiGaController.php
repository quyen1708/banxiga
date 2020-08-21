<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Orderlist;
use App\Models\Product_images;
use App\Models\Products;
use Illuminate\Http\Request;
use App\Cart;


class BanXiGaController extends Controller
{
    public function home()
    {
        return view('/banxiga/home');
    }

    public function gioithieu()
    {
        return view('/banxiga/gioithieu');
    }

    public function categories()
    {
        $cates = Categories::query()->select('name', 'id')->get();
        $ids = Categories::query()->select('id')->get()->pluck('id')->toArray();
        shuffle($ids);
        $ids_shuffle = array_slice($ids, 0, 5);
        foreach ($ids_shuffle as $category_id) {
            $products[] = Products::query()
                ->with(['category', 'images'])
                ->where('category_id', $category_id)
                ->limit(3)
                ->get();
        }
//       dd($products);
        return view('/banxiga/home', [
            'cates' => $cates,
            'products' => $products
        ]);

    }

//    public function product(Request  $request)
//    {
//        $products = Products::query()->with('images')->paginate($request->get('page', 1));
//        $products->first()->images;
//    }
//    public function productImage()
//    {
////        $products = Products::all();
//    }
    public function search(Request $request)
    {
        $q = $request->get('search', '');

        $cates = Categories::query()->select('name', 'id')->get();

        $total = Products::with('images')
            ->where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->count();

        $products = Products::with('images')
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->paginate(6);

        return view('/banxiga/search', [
            'cates' => $cates,
            'products' => $products,
            'total' => $total,
        ]);
    }

    public function categoryClass($id)
    {
        $cates = Categories::query()->select('name', 'id')
            ->get();
        $products[] = Products::query()
            ->with(['category', 'images'])
            ->Where('category_id', $id)
            ->paginate(6);
        return view('/banxiga/categoryClass', [
            'cates' => $cates,
            'products' => $products
        ]);
    }

    public function productDetail($id)
    {
        $cates = Categories::query()->select('name', 'id')
            ->get();
        $products = Products::query()
            ->where('id', $id)
            ->with(['images'])
            ->first();
//       dd($products);
        return view('/banxiga/productDetail', [
            'cates' => $cates,
            'products' => $products
        ]);
    }

    public function addCart(Request $request, $id)
    {
        $products = Products::query()
            ->where('id', $id)
            ->with(['images'])
            ->first();


        if ($products != null) {
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->addCart($products, $id);
            $request->Session()->put('Cart', $newCart);
//            dd($newCart);

        }
        return view('/banxiga/cart');
    }

    public function DeleteItemCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        $request->Session()->put('Cart', $newCart);
//        if (Count($newCart->products) > 0) {
//            $request->Session()->put('Cart', $newCart);
//        } else {
//            $request->Session()->forget("Cart");
//        }
        return view('/banxiga/cart');
    }

    public function ListCart()
    {
        return view("/banxiga/shopping-cart");
    }

    public function DeleteItemListCart(Request $request, $id)
    {
        $oldCart = Session('Cart') ? Session('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->DeleteItemCart($id);
        $request->Session()->put('Cart', $newCart);
        return view('/banxiga/list-cart');
    }

//    public function SaveListItemCart(Request $request, $id, $quanty)
//    {
//        $oldCart = Session('Cart') ? Session('Cart') : null;
//        $newCart = new Cart($oldCart);
//        $newCart->UpdateItemCart($id, $quanty);
//        $request->Session()->put('Cart', $newCart);
//        return view('/banxiga/list-cart');
//    }
    public function SaveAllListItemCart(Request $request)
    {
        foreach ($request->data as $item){
            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->UpdateItemCart($item["key"], $item["value"]);
            $request->Session()->put('Cart', $newCart);
        }
    }

//    public function DeleteAllListItemCart(Request $request)
//    {
//        foreach ($request->data as $item){
//            $oldCart = Session('Cart') ? Session('Cart') : null;
//            $newCart = new Cart($oldCart);
//            $newCart->DeleteItemCart($item["key"], $item["value"]);
//            $request->Session()->put('Cart', $newCart);
//        }
//    }

    public function store(BanxigaCreateRequest $request)
    {
        $todos = Orderlist::create($request->only('cus_name	', 'cus_phone', 'cus_email', 'cus_address'));
        return redirect()->back()->with('message', 'Yêu cầu mua hàng đã được gửi đi!');
    }

    public function create()
    {
        return view("/banxiga/shopping-cart");
    }
}

