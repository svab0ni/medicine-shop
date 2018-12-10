@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach($medicines as $medicine)
                        <div class="col-md-3">
                            @include('pages.common.cards.medicine-card', ['item' => $medicine, 'cardType' => 'index'])

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@stop