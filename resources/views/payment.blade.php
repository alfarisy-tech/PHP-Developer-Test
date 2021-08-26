@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Pay you order') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('order-history') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">




                                <div class="input-group mb-3">

                                    <label for="mobileNumber"
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Order No') }}</label>
                                    <input type="text" class="form-control" placeholder="Mobile Number" name="mobile"
                                        value="{{ $model->no_order }}" aria-label="Mobile Number" readonly
                                        aria-describedby="basic-addon1">
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
