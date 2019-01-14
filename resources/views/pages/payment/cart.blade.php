@extends('layouts.default')


@section('content')
    @php $sum = 0;@endphp
    <div class="container">
        <div class="row mt-5">
            <h1>My cart</h1>
            <div class="col-md-12">
                @if(!empty($cart))
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Item name</th>
                            <th>Quantity</th>
                            <th>Price per item</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($cart as $key => $item)
                            <tr>
                                <td>{{ $key }}</td>
                                <td> {{ $item['name'] }}</td>
                                <td> <span id="{{$key}}-quantity">{{ $item['quantity'] }}</span></td>
                                <td> <span id="{{ $key }}-price">{{ $item['price'] }}</span></td>
                                <td>
                                    @if($item['quantity'] > 1)
                                        <button type="button" class="btn btn-primary btn-sm quantity-decrease" data-item-id="{{ $key }}" id="{{ $key }}-quantity-decrease">-</button>
                                    @else
                                        <button type="button" class="btn btn-primary btn-sm quantity-decrease" disabled data-item-id="{{ $key }}"  id="{{ $key }}-quantity-decrease">-</button>

                                    @endif
                                    <button type="button" class="btn btn-secondary btn-sm quantity-increase" data-item-id="{{ $key }}" id="{{ $key }}-quantity-increase">+</button>
                                    <button type="button" class="btn btn-outline-danger btn-sm remove-from-cart" data-item-id="{{ $key }}"><i class="fa fa-trash"></i></button>
                                </td>
                                @php $sum += $item['quantity'] * $item['price']; @endphp
                            </tr>
                        @endforeach

                        <tr class="table-dark text-dark">
                            <td colspan="4">Total:</td>
                            <td ><span id="total-price">{{ $sum }}</span></td>
                        </tr>
                        <tr>
                            <td colspan="4"></td>
                            <td><a class="btn btn-success my-2 my-sm-0" href="/checkout">Proceed to checkout <i class="fa fa-credit-card"></i></a></td>
                        </tr>
                    </table>
                @else
                    <p>Nothing to display</p>
                @endif
            </div>
        </div>
    </div>
@stop