@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Product Page') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('product-page-submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">




                                <div class="input-group mb-3">

                                    <label for=""
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Product') }}</label>
                                    <textarea class="form-control" name="product_name" id="" cols="30"
                                        rows="3">{{ old('product_name') }}</textarea>
                                </div>
                                <div class="offset-md-4">
                                    @if ($errors->has('product_name'))
                                        <div class="text-danger">

                                            {{ $errors->first('product_name') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">

                                    <label for=""
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Shipping Address') }}</label>
                                    <textarea class="form-control" name="shipping_address" id="" cols="30"
                                        rows="5"> {{ old('shipping_address') }}</textarea>
                                </div>
                                <div class="offset-md-4">
                                    @if ($errors->has('shipping_address'))
                                        <div class="text-danger">

                                            {{ $errors->first('shipping_address') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="input-group mb-3">

                                    <label for=""
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Price') }}</label>
                                    <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                                </div>
                                <div class="offset-md-4">
                                    @if ($errors->has('price'))
                                        <div class="text-danger">

                                            {{ $errors->first('price') }}
                                        </div>
                                    @endif
                                </div>


                            </div>



                            <div class="form-group row mb-0 text-center">
                                <div class="input-group mb-3 ">

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-md btn-primary form-control">
                                            {{ __('Submit') }}
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
