@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.profile.includes.sidebar')
            </div>
            <div class="col-md-9">
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Company</th>
                    </tr>
                    @foreach($medicines as $key => $medicine)
                        <tr>
                            <td>{{ $medicine->id }}</td>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->price }}</td>
                            <td>{{ $medicine->company->name }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="4">Address: {{$delivery->address}}</td>
                    </tr>
                    <tr>
                        <td colspan="4">Total: {{$delivery->price}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@stop