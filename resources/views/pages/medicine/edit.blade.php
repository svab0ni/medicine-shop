@extends('layouts.default')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <form action="/medicine/{{$medicine->id}}/update" method="post">
                @csrf
                <input type="hidden" name="medicine_id" value="{{ $medicine->id }}">
                @include('pages.medicine.form')
            </form>
        </div>
    </div>
@stop