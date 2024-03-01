<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.user.order.index',['orders' =>$orders ]);
    }

    public function store(Request $request)
    {
        $getCart = session()->get('cart');
        if(!empty($getCart)){

            $order = Order::create([
                'user_id' => Auth::user()->id,
                'order_total' => $request->order_total,
            ]);
            foreach($getCart as $key=> $cart){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'book_id' => $key,
                    'quantity' => $cart['quantity'],
                    'price' => $cart['price'],
                ]);
            }
            $getCart = session()->forget('cart');
            return redirect()->back()->with('success', 'Order Place successfully');
        }
        return redirect()->back()->with('error', 'No item in cart');
        
    }

    public function showRatingView($orderId,$orderDetailId)
    {
        $detail = OrderDetail::with(['book'])->find($orderDetailId)->first();
        $html =  view('frontend.user.order.rating',compact('detail','orderId'))->render();
        return $html;
    }

    public function ratingStore(Request $request,$orderId,$oderDetailId)
    {
        $request->validate([
            'star_rating' => 'bail|required',
        ]);
        $order = Order::find($orderId)->first();
        $orderDetail = OrderDetail::with(['book'])->where('id',$oderDetailId)->first();
        
        if(auth()->user()->id == $order->user_id){

            $rating = Review::create([
                'order_detail_id'   => $orderDetail->id,
                'book_id'           => $orderDetail->book_id,
                'user_id'           => auth()->user()->id,
                'star_rating'       => $request->star_rating,
                'review'            => $request->review ?? null,
            ]);
            return back()->with('success', 'Rating submited successfully!');
        }
        else{
            return redirect()->back()->with('error','Unabailable', 403);
        }
    }
}
