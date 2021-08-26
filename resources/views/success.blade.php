@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Success') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('payment') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">




                                <div class="input-group mb-3">

                                    <label for="mobileNumber"
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Order No') }}</label>

                                    @if ($data->mobile == null or $data->mobile == '')
                                        <input type="text" class="form-control" placeholder="Mobile Number" name="no_order"
                                            value="{{ $no_order_ }}" aria-label="Mobile Number" readonly
                                            aria-describedby="basic-addon1">
                                    @else
                                        <input type="text" class="form-control" placeholder="Mobile Number" name="no_order"
                                            value="{{ $no_order }}" aria-label="Mobile Number" readonly
                                            aria-describedby="basic-addon1">
                                    @endif

                                    <input name="id" value="{{ $data->id }}" hidden>
                                </div>
                                <div class="input-group mb-3">

                                    <label for="mobileNumber"
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Total') }}</label>

                                    <input hidden type="text" class="form-control" placeholder="Mobile Number" name="total"
                                        value="{{ $data->total }}" aria-label="Mobile Number" readonly
                                        aria-describedby="basic-addon1">
                                    <input name="plus" value="081" hidden>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name=""
                                        value="Rp {{ number_format($data->total, 0, ',', '.') }}"
                                        aria-label="Mobile Number" readonly aria-describedby="basic-addon1">
                                    <input name="plus" value="081" hidden>
                                </div>

                                <div class="offset-md-4">
                                    @if ($data->mobile == '' or $data->mobile == null)
                                        <h6> <span class="text-success">{{ $data->product_name }}</span>
                                            that costs
                                            <span class="badge badge-info">
                                                Rp {{ number_format($data->price, 0, ',', '.') }}</span>
                                            will be shipped
                                            <br>
                                            to :
                                            <br>
                                            <span class="text-success">{{ $data->shipping_address }}</span>
                                            <br>
                                            only after you pay.
                                        </h6>

                                    @else
                                        <h6> Your mobile phone number <span
                                                class="text-success">{{ $data->mobile }}</span>
                                            will receive
                                            <span class="badge badge-info">
                                                Rp {{ number_format($data->value, 0, ',', '.') }}</span>

                                        </h6>
                                    @endif


                                </div>

                            </div>




                            <div class="form-group row mb-0 text-center">
                                <div class="input-group mb-3 ">

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-md btn-primary form-control">
                                            {{ __('Pay Now') }}
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
