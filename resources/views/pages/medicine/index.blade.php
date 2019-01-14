@extends('layouts.default')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @include('pages.medicine.templates.standard', ['item' => $medicine, 'templateType' => 'standard'])
                </div>
            </div>
            <div class="col-md-3">
                <div class="row">
                    @include('pages.common.templates.template3', ['title' => 'Related news'])
                </div>
            </div>
        </div>

        <div class="row">
            @include('pages.common.templates.template4', ['title' => 'Top selling'])
        </div>
    </div>
@stop