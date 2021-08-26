<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v6;

class DetailOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = Order::find($id);
        $no_order = 'PB' . '-' . time();
        $no_order_ = 'PN' . '-' . time();
        return view('success', compact('data', 'no_order', 'no_order_'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cek = $request->id;

        if (DB::table('detail_order')
            ->where('id_order', $cek)
            ->first()
        ) {
            $data = DB::select("select * from detail_order where id_order= $cek");
            foreach ($data as $row) {
                $row->id;
            }
            return redirect('payments/' . $row->id);
        } else {
            $model = new DetailOrder();
            $model->id_order = $request->id;
            $model->no_order = $request->no_order;
            $model->total = $request->total;
            $model->total = $request->total;
            $model->status = 1;
            $model->save();
            $id = $model->id;
            return redirect('payments/' . $id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showPayment($id)
    {
        $model = DetailOrder::find($id);
        // dd($model);
        return view('payment', compact('model'));
    }
    public function orderHistory(Request $request)
    {
        $id =  Auth::user()->id;
        $data = DB::table('order')
            ->join('detail_order', 'order.id', '=', 'detail_order.id')
            ->select('order.*', 'detail_order.*')
            ->where('order.id_user', $id)
            ->get();
        return view('order-history', compact('data'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request, $id)

    {
        $status = 1;
        $model = DB::table('detail_order')
            ->where('id', $id)
            ->update(['status' => 1]);
        $id =  Auth::user()->id;
        $data = DB::table('order')
            ->join('detail_order', 'order.id', '=', 'detail_order.id')
            ->select('order.*', 'detail_order.*')
            ->where('order.id_user', $id)
            ->get();
        return view('order-history', compact('data'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
