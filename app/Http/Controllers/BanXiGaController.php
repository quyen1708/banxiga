<?php

namespace App\Http\Controllers;

use App\Http\Requests\BanxigaCreateRequest;
use App\LogUser;
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
//    public function home()
//    {
//        return view('/banxiga/home');
//    }

//    public function webJoin()
//    {
////        $dayJoin = count(LogUser::query()->select('id')
////            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
////            ->get()
////            ->toArray());
//////        dd($dayJoin);
////        $weekJoin = count(LogUser::query()->select('id')
////            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
////            ->get()
////            ->toArray());
////        $monthJoin = count(LogUser::query()->select('id')
////            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
////            ->get()
////            ->toArray());
////        $totalJoin = count(LogUser::query()->select('id')
////            ->get()
////            ->toArray());
////        $webJoin[]=[$dayJoin, $weekJoin, $monthJoin, $totalJoin];
////        dd($webJoin);
////        $logUser = new LogUser();
////        $logUser->ip = $request->ip();
////        $logUser->useragent = $request->server('HTTP_USER_AGENT');
////        $logUser->save();
////        return $webJoin[];
//    }

    public function gioithieu()
    {
        return view('/banxiga/gioithieu');
    }

    public function home(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();

//        dd($date);
        $nowJoin = count(LogUser::query()->select('id')
            ->whereBetween('created_at', [now()->subMinutes(15), now()])
            ->get()
            ->toArray());
        $dayJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
            ->get()
            ->toArray());
//        dd($dayJoin);
        $weekJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->get()
            ->toArray());
        $monthJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->get()
            ->toArray());
        $totalJoin = count(LogUser::query()->select('id')
            ->get()
            ->toArray());
        $webJoin=[$nowJoin, $dayJoin, $weekJoin, $monthJoin, $totalJoin];
//        dd($webJoin);
        if(($logUsr = count(LogUser::query()
                ->select('id')
                ->where('ip', $request->ip())
                ->get()
                ->toArray())) == 0 || $logUsr = count(LogUser::query()
                    ->select('id')
                    ->where('ip', $request->ip())
                    ->whereBetween('created_at', [now()->subMinutes(15), now()])
                    ->get()
                    ->toArray()) == 0) {
            $logUser = new LogUser();
            $logUser->ip = $request->ip();
            $logUser->useragent = $request->server('HTTP_USER_AGENT');
            $logUser->save();
        }else{
            LogUser::query()->where('ip', $request->ip())->orderBy('id', 'DESC')->first()
            ->update(['updated_at' => $date]);
        }

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
                ->where('amont','>',0)
                ->inRandomOrder()
                ->limit(3)
                ->get();
        }
//       dd($products);
        $topProducts []= Products::query()
            ->with('images')
            ->orderBy('selled', 'DESC')
            ->where('amont','>',0)
            ->limit(4)
            ->get();

//        dd($topProducts);
        return view('/banxiga/home', [
            'webJoin' => $webJoin,
            'topProducts' => $topProducts,
            'cates' => $cates,
            'products' => $products
        ]);
    }

    public function ListGioiThieu(Request $request)
    {
        $date = Carbon::now()->toDateTimeString();

//        dd($date);
//        $logUsers[] = LogUser::query()->where('created_at', '>=', Carbon::today())->get()->toArray();
//        $a = count($logUsers[0]);
        $nowJoin = count(LogUser::query()->select('id')
            ->whereBetween('created_at', [now()->subMinutes(15), now()])
            ->get()
            ->toArray());
        $dayJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
            ->get()
            ->toArray());
//        dd($dayJoin);
        $weekJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->get()
            ->toArray());
        $monthJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->get()
            ->toArray());
        $totalJoin = count(LogUser::query()->select('id')
            ->get()
            ->toArray());
        $webJoin=[$nowJoin, $dayJoin, $weekJoin, $monthJoin, $totalJoin];
//        dd($webJoin);
        if(($logUsr = count(LogUser::query()
                ->select('id')
                ->where('ip', $request->ip())
                ->get()
                ->toArray())) == 0 || $logUsr = count(LogUser::query()
                    ->select('id')
                    ->where('ip', $request->ip())
                    ->whereBetween('created_at', [now()->subMinutes(15), now()])
                    ->get()
                    ->toArray()) == 0) {
            $logUser = new LogUser();
            $logUser->ip = $request->ip();
            $logUser->useragent = $request->server('HTTP_USER_AGENT');
            $logUser->save();
        }
//        else{
//            LogUser::query()->where('ip', $request->ip())->orderBy('id', 'DESC')->first()
//                ->update(['updated_at' => $date]);
//        }
        $products[] = Products::query()
            ->where('amont','>',0)
            ->with('images')
            ->orderBy('selled', 'DESC')
            ->limit(3)
            ->get();
        $randproducts = Products::query()
            ->where('amont','>',0)
            ->with('images')
            ->inRandomOrder()
            ->limit(6)
            ->get();
//        dd($randproducts);
        return view('banxiga/gioithieu', [
            'webJoin' => $webJoin,
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
        $date = Carbon::now()->toDateTimeString();

//        dd($date);
//        $logUsers[] = LogUser::query()->where('created_at', '>=', Carbon::today())->get()->toArray();
//        $a = count($logUsers[0]);
        $nowJoin = count(LogUser::query()->select('id')
            ->whereBetween('created_at', [now()->subMinutes(15), now()])
            ->get()
            ->toArray());
        $dayJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
            ->get()
            ->toArray());
//        dd($dayJoin);
        $weekJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->get()
            ->toArray());
        $monthJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->get()
            ->toArray());
        $totalJoin = count(LogUser::query()->select('id')
            ->get()
            ->toArray());
        $webJoin=[$nowJoin, $dayJoin, $weekJoin, $monthJoin, $totalJoin];
//        dd($webJoin);
        if(($logUsr = count(LogUser::query()
                ->select('id')
                ->where('ip', $request->ip())
                ->get()
                ->toArray())) == 0 || $logUsr = count(LogUser::query()
                    ->select('id')
                    ->where('ip', $request->ip())
                    ->whereBetween('created_at', [now()->subMinutes(15), now()])
                    ->get()
                    ->toArray()) == 0) {
            $logUser = new LogUser();
            $logUser->ip = $request->ip();
            $logUser->useragent = $request->server('HTTP_USER_AGENT');
            $logUser->save();
        }else{
            LogUser::query()->where('ip', $request->ip())->orderBy('id', 'DESC')->first()
                ->update(['updated_at' => $date]);
        }

        $q = $request->get('search', '');

        $cates = Categories::query()
            ->where('status', 1)
            ->select('name', 'id')
            ->get();

        $total = Products::with('images')
            ->where('status', 1)
            ->where('amont','>',0)
            ->where('name', 'LIKE', '%' . $q . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->count();

        $products = Products::with('images')
            ->where('status', 1)
            ->where('amont','>',0)
            ->where('name', 'LIKE', '%' . $request->search . '%')
            ->orWhere('description', 'LIKE', '%' . $q . '%')
            ->paginate(6);

        $topProducts[]= Products::query()
            ->with('images')
            ->where('amont','>',0)
            ->orderBy('selled', 'DESC')
            ->limit(4)
            ->get();

        return view('/banxiga/search', [
            'webJoin' => $webJoin,
            'topProducts'   => $topProducts,
            'cates'         => $cates,
            'products'      => $products,
            'total'         => $total,
        ]);
    }

    public function categoryClass(Request $request, $id)
    {
        $date = Carbon::now()->toDateTimeString();

//        dd($date);
//        $logUsers[] = LogUser::query()->where('created_at', '>=', Carbon::today())->get()->toArray();
//        $a = count($logUsers[0]);
        $nowJoin = count(LogUser::query()->select('id')
            ->whereBetween('created_at', [now()->subMinutes(15), now()])
            ->get()
            ->toArray());
        $dayJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
            ->get()
            ->toArray());
//        dd($dayJoin);
        $weekJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->get()
            ->toArray());
        $monthJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->get()
            ->toArray());
        $totalJoin = count(LogUser::query()->select('id')
            ->get()
            ->toArray());
        $webJoin=[$nowJoin, $dayJoin, $weekJoin, $monthJoin, $totalJoin];
//        dd($webJoin);
        if(($logUsr = count(LogUser::query()
                ->select('id')
                ->where('ip', $request->ip())
                ->get()
                ->toArray())) == 0 || $logUsr = count(LogUser::query()
                    ->select('id')
                    ->where('ip', $request->ip())
                    ->whereBetween('created_at', [now()->subMinutes(15), now()])
                    ->get()
                    ->toArray()) == 0) {
            $logUser = new LogUser();
            $logUser->ip = $request->ip();
            $logUser->useragent = $request->server('HTTP_USER_AGENT');
            $logUser->save();
        }else{
            LogUser::query()->where('ip', $request->ip())->orderBy('id', 'DESC')->first()
                ->update(['updated_at' => $date]);
        }
        $cates = Categories::query()->where('status', 1)->select('name', 'id')
            ->get();
        $products[] = Products::query()
            ->where('status', 1)
            ->where('amont','>',0)
            ->with(['category', 'images'])
            ->Where('category_id', $id)
            ->paginate(6);
        $topProducts[]= Products::query()
            ->with('images')
            ->where('amont','>',0)
            ->orderBy('selled', 'DESC')
            ->limit(4)
            ->get();
        return view('/banxiga/categoryClass', [
            'webJoin' => $webJoin,
            'topProducts'   => $topProducts,
            'cates'         => $cates,
            'products'      => $products
        ]);
    }

    public function productDetail(Request $request, $id)
    {
        $date = Carbon::now()->toDateTimeString();

//        dd($date);
//        $logUsers[] = LogUser::query()->where('created_at', '>=', Carbon::today())->get()->toArray();
//        $a = count($logUsers[0]);
        $nowJoin = count(LogUser::query()->select('id')
            ->whereBetween('created_at', [now()->subMinutes(15), now()])
            ->get()
            ->toArray());
        $dayJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subDay()->toDateTimeString())
            ->get()
            ->toArray());
//        dd($dayJoin);
        $weekJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subWeek()->toDateTimeString())
            ->get()
            ->toArray());
        $monthJoin = count(LogUser::query()->select('id')
            ->where('created_at', '>=', Carbon::now()->subMonth()->toDateTimeString())
            ->get()
            ->toArray());
        $totalJoin = count(LogUser::query()->select('id')
            ->get()
            ->toArray());
        $webJoin=[$nowJoin, $dayJoin, $weekJoin, $monthJoin, $totalJoin];
//        dd($webJoin);
        if(($logUsr = count(LogUser::query()
                ->select('id')
                ->where('ip', $request->ip())
                ->get()
                ->toArray())) == 0 || $logUsr = count(LogUser::query()
                    ->select('id')
                    ->where('ip', $request->ip())
                    ->whereBetween('created_at', [now()->subMinutes(15), now()])
                    ->get()
                    ->toArray()) == 0) {
            $logUser = new LogUser();
            $logUser->ip = $request->ip();
            $logUser->useragent = $request->server('HTTP_USER_AGENT');
            $logUser->save();
        }else{
            LogUser::query()->where('ip', $request->ip())->orderBy('id', 'DESC')->first()
                ->update(['updated_at' => $date]);
        }
        $cates = Categories::query()->select('name', 'id')
            ->get();
        $products = Products::query()
            ->with(['imagesdetail'])
            ->where('id', $id)
            ->first();
//       dd($products);
        $topProducts[]= Products::query()
            ->where('amont','>',0)
            ->with('images')
            ->orderBy('selled', 'DESC')
            ->limit(4)
            ->get();
        return view('/banxiga/productDetail', [
            'webJoin' => $webJoin,
            'topProducts'   => $topProducts,
            'cates'         => $cates,
            'products'      => $products,
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

    public function Order()
    {
        return view('/banxiga/send_order');
    }

    public function SendOrder(BanxigaCreateRequest $request)
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

        $data = array();
        $values = [];
        foreach ($mycart->products as $item) {
            $values[$item['productInfo']->id] = $item['quanty'];
            $data[] = [
                'order_id' => $order_id,
                'qty' => $item['quanty'],
                'product_id' => $item['productInfo']->id,
                'product_name' => $item['productInfo']->name,
                'money' => $item['price']
            ];
        };
        OrderListProduct::query()->insert($data);

        $result = self::updateValuesSelled($values);
        $result = self::updateValuesAmont($values);

        $request->Session()->forget('Cart');
        return response()->json(['message'=>'success']);
    }

    public static function updateValuesSelled(array $values)
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

    public static function updateValuesAmont(array $values)
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
        return \DB::update("UPDATE `{$table}` SET `amont` = `amont` - CASE `id` {$cases} END, `updated_at` = ? WHERE `id` in ({$ids})", $params);
    }
}



