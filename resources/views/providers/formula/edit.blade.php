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
                    <label><b>Formula Short</b></label>
                    <input type="text" name="formula_short" id="formula_short" class="form-control" placeholder="Formula Short" value="{{ $formula ? $formula[0]['formula_short'] : ''}}" required="required" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial A</b></label>
                    <input type="text" name="vial_0[]" id="vial_0" class="form-control" placeholder="Vial A" value="{{ isset($vials[0]) ? $vials[0]['vial'] : ''}}" required="required" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="vial_0[]" id="vial_0" placeholder="Color" value="{{ isset($vials[0]) ? $vials[0]['color'] : ''}}" required="required"/>
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class</b></label>
                    <input type="text" class="form-control" name="vial_0[]" id="vial_0" placeholder="Class" value="{{ isset($vials[0]) ? $vials[0]['class'] : ''}}" required="required"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial B</b></label>
                    <input type="text" name="vial_1[]" id="vial_1" class="form-control" placeholder="Vial B" value="{{ isset($vials[1]) ? $vials[1]['vial'] : ''}}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="vial_1[]" id="vial_1" placeholder="Color" value="{{ isset($vials[1]) ? $vials[1]['color'] : '' }}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class</b></label>
                    <input type="text" class="form-control" name="vial_1[]" id="vial_1" placeholder="Class" value="{{ isset($vials[1]) ? $vials[1]['class'] : '' }}" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial C</b></label>
                    <input type="text" name="vial_2[]" id="vial_2" class="form-control" placeholder="Vial C" value="{{ isset($vials[2]) ? $vials[2]['vial'] : ''}}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="vial_2[]" id="vial_2" placeholder="Color" value="{{ isset($vials[2]) ? $vials[2]['color'] : '' }}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class</b></label>
                    <input type="text" class="form-control" name="vial_2[]" id="vial_2" placeholder="Class" value="{{ isset($vials[2]) ? $vials[2]['class'] : '' }}" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial D</b></label>
                    <input type="text" name="vial_3[]" id="vial_3" class="form-control" placeholder="Vial D" value="{{ isset($vials[3]) ? $vials[3]['vial'] : ''}}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="vial_3[]" id="vial_3" placeholder="Color" value="{{ isset($vials[3]) ? $vials[3]['color'] : ''}}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class</b></label>
                    <input type="text" class="form-control" name="vial_3[]" id="vial_3" placeholder="Class" value="{{ isset($vials[3]) ? $vials[3]['class'] : ''}}" />
                </div>
            </div>
            <div class="row" >
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Vial E</b></label>
                    <input type="text" name="vial_4[]" id="vial_4" class="form-control" placeholder="Vial E" value="{{ isset($vials[4]) ? $vials[4]['vial'] : ''}}" />     
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Color</b></label>
                    <input type="text" class="form-control" name="vial_4[]" id="vial_4" placeholder="Color" value="{{ isset($vials[4]) ? $vials[4]['color'] : ''}}" />
                </div>
                <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <label><b>Class</b></label>
                    <input type="text" class="form-control" name="vial_4[]" id="vial_4" placeholder="Class" value="{{ isset($vials[4]) ? $vials[4]['class'] : ''}}" />
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="formula_id" value="{{ !empty($formula_detail) ? $formula_detail[0]['FORMULA_ID'] : ''}}"/>
                <input type="hidden" name="provider_id" value="{{ isset($provider_id) ? $provider_id : '' }}"/>
                <input type="submit" class="btn purple-btn btn-sm" value="Save">
            </div>
        </form>
    </div>
</div>
@endsection
