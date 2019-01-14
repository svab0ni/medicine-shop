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
                        </tr>
                        @foreach($cart as $key => $item)
                            <tr>
                                <td>{{ $key }}</td>
                                <td> {{ $item['name'] }}</td>
                                <td> <span id="{{$key}}-quantity">{{ $item['quantity'] }}</span></td>
                                <td> <span id="{{ $key }}-price">{{ $item['price'] }}</span></td>
                                @php $sum += $item['quantity'] * $item['price']; @endphp
                            </tr>
                        @endforeach

                        <tr class="table-dark text-dark">
                            <td colspan="3">Total:</td>
                            <td ><span id="total-price">{{ $sum }}</span></td>
                        </tr>
                    </table>
                @else
                    <p>Nothing to display</p>
                @endif
            </div>
        </div>

        <div class="row mt-lg-5">
            <h1>Enter delivery data</h1>
        </div>

        <form action="{{ route('purchase') }}" method="post" class="mt-5">
            @csrf
            <div class="form-group row">
                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" disabled>
                </div>
            </div>

            <div class="form-group row">
                <label for="address" class="col-sm-4 col-form-label text-md-right">{{ __('Delivery Address') }}</label>

                <div class="col-md-6">
                    <input id="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required autofocus>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('address') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-4 col-form-label text-md-right">{{ __('Phone number') }}</label>

                <div class="col-md-6">
                    <input id="phone" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}">

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('phone') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="note" class="col-sm-4 col-form-label text-md-right">{{ __('Note for courier') }}</label>

                <div class="col-md-6">
                    <input id="note" class="form-control{{ $errors->has('note') ? ' is-invalid' : '' }}" name="note" value="{{ old('note') }}">

                    @if ($errors->has('note'))
                        <span class="invalid-feedback" role="alert"><strong>{{ $errors->first('note') }}</strong></span>
                    @endif
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-success my-2 my-sm-0">Purchase</button>
                </div>
            </div>
        </form>
    </div>
@stop