@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Formula Edit'])
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
<div class="tab-pane fade show active" id="orderReception">
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"><span></span></div>
        <div clas=""><span><a href="{{ URL('/provider/view/'.$provider_id) }}">Back</a></span></div>
    </div>
    <div class="p-3">
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="clearfix"></div>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label><b>Formul Id: </b> </label>
                {{ isset($formula_detail) ? $formula_detail[0]['FORMULA_ID'] : ''}}
            </div>
            <div class="form-group col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <label><b>Formul Name: </b></label>
                {{ isset($formula_detail) ? $formula_detail[0]['NAME'] : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <label><b>Provider: </b></label>
                {{ isset($provider_name) ? $provider_name : ''}}
            </div>
        </div>
    </div>

    <div class="modal-body">
        <form action="{{ URL('/provider/formula/update') }}" method="post" class="add-new-form">
            @csrf
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial A: </b></label>
                    {{isset($vials[0]['vial']) ? $vials[0]['vial'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color: </b></label>
                    {{isset($vials[0]['color']) ? $vials[0]['color'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class: </b></label>
                    {{isset($vials[0]['class']) ? $vials[0]['class'] : ''}}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial B: </b></label>
                    {{isset($vials[1]['vial']) ? $vials[1]['vial'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color: </b></label>
                    {{isset($vials[1]['color']) ? $vials[1]['color'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class: </b></label>
                     {{isset($vials[1]['class']) ? $vials[1]['class'] : ''}}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial C: </b></label>
                    {{isset($vials[2]['vial']) ? $vials[2]['vial'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color: </b></label>
                    {{isset($vials[2]['color']) ? $vials[2]['color'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class: </b></label>
                    {{isset($vials[2]['class']) ? $vials[2]['class'] : ''}}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial D: </b></label>
                    {{isset($vials[3]['vial']) ? $vials[3]['vial'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color: </b></label>
                    {{isset($vials[3]['color']) ? $vials[3]['color'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class: </b></label>
                    {{isset($vials[3]['class']) ? $vials[3]['class'] : ''}}
                </div>
            </div>
            <div class="row" >
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial E: </b></label>
                    {{isset($vials[4]['vial']) ? $vials[4]['vial'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color: </b></label>
                    {{isset($vials[4]['color']) ? $vials[4]['color'] : ''}}
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class: </b></label>
                    {{isset($vials[4]['class']) ? $vials[4]['class'] : ''}}
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
