@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                @include('pages.profile.includes.sidebar')
            </div>
            <div class="col-md-9">
                <div class="btn-group mb-5">
                    <a class="btn btn-outline-info btn-sm" href="/medicine/create"><i class="fa fa-plus"> Create new</i></a>

                </div>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Ordered at</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($medicines as $key => $medicine)
                        <tr>
                            <td>{{ $medicine->id }}</td>
                            <td>{{ $medicine->created_at }}</td>
                            <td>{{ $medicine->name }}</td>
                            <td>{{ $medicine->company->name}}</td>
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="/medicine/{{ $medicine->id }}/edit"><i class="fa fa-pencil"></i></a>
                                <a class="btn btn-outline-danger btn-sm" href="/medicine/{{ $medicine->id }}/delete"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination">
                    {{ $medicines->links() }}
                </div>
            </div>
        </div>
    </div>
@stop