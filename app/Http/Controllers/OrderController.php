<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('prepaid-balance');
    }
    public function productPage()
    {
        return view('product-page');
    }
    public function prepaidbalanceSubmit(Request $request)
    {

        $request->validate(
            [
                'mobile' => 'required|min:4|max:9|',
                'value' => 'required'
            ],
        );
        $model = new Order();
        $plus = $request->plus;
        $number = $request->mobile;
        $mobile = $plus . '' . $number;
        $model->mobile = $mobile;
        $value = $request->value;
        $fee = $value * 0.05;
        $model->fee = $fee;

        $value_ = $value + $fee;
        $model->total = $value_;
        $model->value = $value;
        $model->id_user =  Auth::user()->id;
        $model->save();
        $id = $model->id;
        // dd($id);

        return redirect('success/' . $id);
    }
    public function productpageSubmit(Request $request)
    {

        $request->validate(
            [
                'product_name' => 'required|min:10|max:150|string',
                'shipping_address' => 'required|min:10|max:150|string',
                'price' => 'required|numeric'
            ],
        );
        $model = new Order();
        $model->product_name = $request->get('product_name');
        $model->shipping_address = $request->get('shipping_address');
        $price = $request->price;
        $total_price = $price + 10000;
        $model->price = $price;
        $model->total = $total_price;
        $model->id_user =  Auth::user()->id;
        $model->save();
        $id = $model->id;
        // dd($id);

        return redirect('success/' . $id);
    }
}
