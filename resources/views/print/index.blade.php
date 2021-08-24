@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Print'])
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-2 mr-3">
        <span class="sidebar-hide-show"><i class="fas fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        {{ isset($stage_name) ? $stage_name : '' }}
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-2 mr-3">
        <span class="sidebar-hide-show"><i class="fas fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        Print Label/Worksheet
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
@section('content')
<div class="tab-pane fade show active" id="orderReception">
    <div class="p-3">
        <div class="clearfix"></div>
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
        @if ( Session::has('success') )
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif			 
        @if ( Session::has('error') )
        <div class="alert alert-success" id="error" role="alert">
            {{ Session::get('error') }}
        </div>
        @endif
    </div>
    <div class="container" style="height: 200px;">
        <form method="post" action="{{ url("/labelprint") }}">
            <div class="row">
                <div class="col-sm-3">
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>
                    <input type="hidden" id="url" value="{{ url('/printworksheet') }}" />
                    <input class="form-control" type="number" name="rx_num" id="rx_num" placeholder="Rx Number..." required="required"/>
                </div>
                <div class="col-sm-4">
                    <button type="submit" class="btn btn-primary"  formtarget="_blank" name="printlabel" id="printlabel" onclick="javascript: form.action='{{ url("labelprint") }}'">Print Label</button>
                    <button type="submit" class="btn btn-primary" formtarget="_blank" name="printworksheet" id="printworksheet" onclick="javascript: form.action='{{ url("printworksheet") }}'">Print Worksheet</button>
                </div>
            </div>
    </div>

</div>

@endsection
