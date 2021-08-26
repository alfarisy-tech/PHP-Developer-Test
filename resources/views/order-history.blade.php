@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Order History') }}</h1>
                    </div>
                    <div class="card-body">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $row)
                                    <tr>
                                        <td>
                                            <div> {{ $row->no_order }} Rp
                                                {{ number_format($row->total, 0, ',', '.') }}</div>
                                            <br>
                                            @if ($row->mobile == null or $row->mobile == 'NULL')
                                                {{ $row->product_name }} that cost Rp
                                                {{ number_format($row->price, 0, ',', '.') }}
                                            @else
                                                Rp {{ number_format($row->value, 0, ',', '.') }}
                                                For {{ $row->mobile }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->status == 1)
                                                <span class="badge badge-success text-center">Success</span>
                                            @elseif($row->status == 2)
                                                <span class="badge badge-warning text-center">Failed</span>
                                            @elseif($row->status == 3)
                                                <span class="badge badge-danger text-center">Cancel</span>
                                            @elseif($row->status == 4)
                                                <span class="badge badge-warning text-center">Shipping Code
                                                    {{ $row->shipping_code }}</span>
                                            @elseif($row->status == 5)
                                                <div class="input-group mb-3 ">

                                                    <div class="col-md-12">
                                                        <a href="{{ url('update-status/' . $row->id) }}"
                                                            class="btn btn-md btn-primary btn-flat">
                                                            {{ __('Pay Now') }}
                                                        </a>
                                                    </div>
                                                </div>
                                            @endif

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
