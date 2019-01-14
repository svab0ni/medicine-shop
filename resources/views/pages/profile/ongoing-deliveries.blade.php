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
                        <th>Ordered at</th>
                        <th>Price</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Review</th>
                    </tr>
                    @foreach($deliveries as $key => $delivery)
                        <tr>
                            <td>{{ $delivery->id }}</td>
                            <td>{{ $delivery->created_at }}</td>
                            <td>{{ $delivery->price }}</td>
                            <td>{{ $delivery->address }}</td>
                            <td>{{ $delivery->status->name }}</td>
                            <td>
                                <a class="btn btn-outline-info btn-sm" href="/profile/purchase/{{ $delivery->id }}"><i class="fa fa-eye"></i></a>
                                @if($delivery->status->id === 3)
                                    <a class="btn btn-outline-info btn-sm" href="/delivery/{{ $delivery->id }}/assign"><i class="fa fa-list-alt"></i></a>
                                @else
                                    <a class="btn btn-outline-info btn-sm" href="/delivery/{{ $delivery->id }}/assign"><i class="fa fa-exchange"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pagination">
                    {{ $deliveries->links() }}
                </div>
            </div>
        </div>
    </div>
@stop