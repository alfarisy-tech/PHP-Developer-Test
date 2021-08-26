@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Prepaid Balance') }}</h1>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('prepaid-balance-submit') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">




                                <div class="input-group mb-3">

                                    <label for="mobileNumber"
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Mobile Number') }}</label>
                                    <span class="input-group-text" id="basic-addon1">081 +</span>
                                    <input type="number" class="form-control" placeholder="Mobile Number" name="mobile"
                                        value="{{ old('mobile') }}" aria-label="Mobile Number"
                                        aria-describedby="basic-addon1">
                                    <input name="plus" value="081" hidden>
                                </div>
                                <div class="offset-md-4">
                                    @if ($errors->has('mobile'))
                                        <div class="text-danger">

                                            {{ $errors->first('mobile') }}
                                        </div>
                                    @endif
                                </div>


                            </div>
                            <div class="form-group row">
                                <div class="input-group mb-3">
                                    <label for="mobileNumber"
                                        class="col-md-4 col-sm-2 col-form-label text-md-left">{{ __('Value') }}</label>
                                    {{-- <span class="input-group-text" id="basic-addon1">081 + </span> --}}
                                    <select type="text" class="form-control" placeholder="Username" aria-label="Username"
                                        name="value" aria-describedby="basic-addon1">
                                        <option value="" selected>Choose Value</option>
                                        <option value="10000">10000</option>
                                        <option value="50000">50000</option>
                                        <option value="100000">100000</option>
                                    </select>
                                </div>
                                <div class="offset-md-4">
                                    @if ($errors->has('value'))
                                        <div class="text-danger">

                                            {{ $errors->first('value') }}
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
