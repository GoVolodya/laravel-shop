<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class CartController extends Controller
{

    public function cart()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        } else {
            return redirect(route('main'));
        }
        return view('cart', compact('order'));
    }

    public function cartAdd($id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($id)) {
            $row = $order->products()->where('product_id', $id)->first()->pivot;
            $row->count++;
            $row->update();
        } else {
            $order->products()->attach($id);
        }

        return redirect(route('cart'));
    }

    public function cartRemove($id)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect(route('cart'));
        }
        $order = Order::find($orderId);
        if ($order->products->contains($id)) {
            $row = $order->products()->where('product_id', $id)->first()->pivot;
            if ($row->count < 2) {
                $order->products()->detach($id);
            } else {
                $row->count--;
                $row->update();
            }
        }
        return redirect(route('cart'));
    }

    public function order()
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect(route('main'));
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    public function orderConfirm(Request $request)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect(route('main'));
        }
        $order = Order::find($orderId);
        $result = $order->saveOrder($request->name, $request->phone);
        if ($result) {
            session()->flash('success', 'Thank you. We take your order, our manager will call you.');
        } else {
            session()->flash('warning', 'Sorry, something go wrong. Try to make a new order.');
        }
        return redirect(route('main'));
    }
}
