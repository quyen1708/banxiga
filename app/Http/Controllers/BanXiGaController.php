<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanxigaCreateRequest;
use App\Models\Categories;
use App\Models\Orderlist;
use App\Models\OrderListProduct;
use App\Models\Product_images;
use App\Models\Products;
use Carbon\Carbon;
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
        $cates = Categories::query()
            ->where('status', 1)
            ->select('name', 'id')
            ->get();
        $ids = Categories::query()
            ->inRandomOrder()
            ->limit(5)
            ->select('id')->get()
            ->pluck('id')->toArray();
        foreach ($ids as $category_id) {
            $products[] = Products::query()
                ->with(['category', 'images'])
                ->where('category_id', $category_id)
                ->inRandomOrder()
                ->limit(3)
                ->get();
        }
//       dd($products);
        return view('/banxiga/home', [
            'cates' => $cates,
            'products' => $products
        ]);
    }

    public function ListGioiThieu()
    {
        $products[] = Products::query()
            ->with('images')
            ->orderBy('selled', 'DESC')
            ->limit(3)
            ->get();
            $randproducts = Products::query()
                ->with('images')
                ->inRandomOrder()
                ->limit(6)
                ->get();
//        dd($randproducts);
        return view('banxiga/gioithieu', [
            'products' => $products,
            'randproducts' => $randproducts
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

        $cates = Categories::query()->where('status', 0)->select('name', 'id')->get();

        $total = Products::with('images')
            ->where('status', 1)
            ->where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->count();

        $products = Products::with('images')
            ->where('status', 1)
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
        $cates = Categories::query()->where('status', 1)->select('name', 'id')
            ->get();
        $products[] = Products::query()
            ->where('status', 1)
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
            'products' => $products,
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
        foreach ($request->data as $item) {
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

    public function SendOrder()
    {
        if (\Session::has("Cart") != null) {
            if (\Session::get('Cart')->totalQuanty > 0) {
                return view('/banxiga/send_order');
            } else {
                return redirect('/home');
            }
        } else {
            return redirect('/home');
        }
    }

    public function CheckOut(BanxigaCreateRequest $request)
    {
        $mycart = \Session::get('Cart');
        $name = $request->get('name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');
        $ids = array();
        $quantys = array();
        $order = new Orderlist();

        $order->cus_name = $name;
        $order->cus_phone = $phone;
        $order->cus_email = $email;
        $order->cus_address = $address;
        $order->payment = $mycart->totalPrice;
        $order->save();
        $order_id = $order->id;

        $đata = array();
        $values = [];
        foreach ($mycart->products as $item) {
//            $ctdh = new OrderListProduct();
//            $ctdh->order_id = $order_id;
//            $ctdh->qty = $item['quanty'];
//            $ctdh->product_id = $item['productInfo']->id;
            $values[$item['productInfo']->id] = $item['quanty'];
//            array_push($ids, $item['productInfo']->id);
//            array_push($quantys, $item['quanty']);
//            $ctdh->product_name = $item['productInfo']->name;
//            $ctdh->money = $item['price'];
//            $ctdh->save();
            $đata[] = [
                'order_id' => $order_id,
                'qty' => $item['quanty'],
                'product_id' => $item['productInfo']->id,
                'product_name' => $item['productInfo']->name,
                'money' => $item['price']
            ];
        };
        OrderListProduct::query()->insert($đata);
//        $products = Products::query()
//            ->select('id','selled')
//            ->wherein('id',$ids)
//            ->get();

//        foreach ($products as $item){
//            $item->selled
//        }
        $result = self::updateValues($values);
//        dd($result,$values);
//        foreach ($products as $product) {
//            foreach ($mycart->products as $item) {
//                if ($item['productInfo']->id == $product->id) {
//                    $product->selled = $product->selled + $item['quanty'];
//                    $product->update(['selled' => $product['selled']]);
//                }
//            }
//        }
        $request->Session()->forget('Cart');
        return response()->json(['message'=>'success']);
    }

    public static function updateValues(array $values)
    {
        $table = Products::getModel()->getTable();
        $cases = [];
        $ids = [];
        $params = [];
        foreach ($values as $id => $value) {
            $id = (int) $id;
            $cases[] = "WHEN {$id} then ?";
            $params[] = $value;
            $ids[] = $id;
        }
        $ids = implode(',', $ids);
        $cases = implode(' ', $cases);
        $params[] = Carbon::now();
        return \DB::update("UPDATE `{$table}` SET `selled` = `selled` + CASE `id` {$cases} END, `updated_at` = ? WHERE `id` in ({$ids})", $params);
    }

}



