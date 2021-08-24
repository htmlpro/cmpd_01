@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Prescription Report'])
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-1 mr-3">
        <span class="sidebar-hide-show tgl-btn"><i class="fa fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        {{ isset($stage_name) ? $stage_name : '' }}
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
@section('content')
<div class="show active">
    <form method="post" action="{{ url('/export') }}">
        @csrf
        <input type="submit" name="export" value="Export in excel(.xls)" class="btn btn-info" />
    </form>
</div>
@endsection
