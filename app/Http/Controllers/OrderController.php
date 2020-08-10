<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $order = Order::all();
        return response()->json($order);
    }

    public function store(Request $request)
    {
        $order = new Order();
        $order->productId = $request->productId;
        $order->orderCode = $request->orderCode;
        $order->quantity = $request->quantity;
        $order->address = $request->address;
        $order->shippingDate = $request->shippingDate;
        $order->created_by = Auth()->id();
        $order->save();
        return response()->json('Ürün başarıyla eklendi.');
    }

    public function show($orderCode)
    {
        $orders = DB::table('orders')
            ->where('orderCode', 'like', $orderCode)
            ->get();
        return response()->json($orders);
    }

    public function showList()
    {
        $orders = Order::paginate(7);
        return response()->json($orders);

    }

    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        if($order->shippingDate == null) {

            $order->productId = $request->productId;
            $order->orderCode = $request->orderCode;
            $order->quantity = $request->quantity;
            $order->address = $request->address;
            $order->shippingDate = $request->shippingDate;
            $order->update();
            return response()->json('Ürün başarıyla düzenlendi.');
        } else {
            return response()->json('Shipping Date güncel.');
        }
    }

    public function destroy($id)
    {
        Order::destroy($id);
        return response()->json('Ürün başarıyla silindi.');
    }

}
