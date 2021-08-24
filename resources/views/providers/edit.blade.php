@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Patient'])
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
        <div clas=""><span><a href="{{ URL('/providers') }}">Back</a></span></div>
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
    @if(!empty($provider))
    <div class="modal-body">
        <form action="{{ URL('/provider/update') }}" method="post" class="add-new-form">
            @csrf
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>First Name</label><span style="color:red">*</span>
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ $provider[0]['first_name'] ? $provider[0]['first_name'] : ''}}" required="required"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ $provider[0]['last_name'] ? $provider[0]['last_name'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Address 1</label><span style="color:red">*</span>
                    <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1" value="{{ $provider[0]['reg_address1'] ? $provider[0]['reg_address1'] : ''}}" required="required"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Address 2</label>
                    <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2" value="{{ $provider[0]['reg_address2'] ? $provider[0]['reg_address2'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="City" value="{{ $provider[0]['reg_city'] ? $provider[0]['reg_city'] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>State</label>
                    <select class="form-control" name="state" id="state">
                        <option value=''>Select State</option>
                        @if(!empty($states))
                        @foreach($states as $key => $value)
                        @if($value['postal_code'] == $provider[0]['reg_state'])
                        <option value="{{$value['postal_code']}}" selected="selected">{{ $value['name'] }}</option>
                        @else
                        <option value="{{$value['postal_code']}}">{{ $value['name'] }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Zip</label>
                    <input type="text" class="form-control" name="zip" id="zip" maxlength="5" placeholder="Zip" value="{{ $provider[0]['reg_zip'] ? $provider[0]['reg_zip'] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Phone</label>
                    <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" maxlength="10" value="{{ $provider[0]['phone1'] ? $provider[0]['phone1'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Fax</label>
                    <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" value="{{ $provider[0]['fax'] ? $provider[0]['fax'] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ $provider[0]['email'] ? $provider[0]['email'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Provider NPI</label>
                    <input type="text" class="form-control" name="npi" id="npi" placeholder="Provider NPI" value="{{ $provider[0]['npi'] ? $provider[0]['npi'] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Provider Supervisor</label>
                    <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Provider Supervisor" value="{{ $provider[0]['supervising_provider'] ? $provider[0]['supervising_provider'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>State License</label>
                    <input type="text" class="form-control" name="license" id="license" placeholder="State License" value="{{ $provider[0]['statelicense'] ? $provider[0]['statelicense'] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>DEA</label>
                    <input type="text" class="form-control" name="dea" id="dea" placeholder="DEA" value="{{ $provider[0]['dea'] ? $provider[0]['dea'] : ''}}"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label>Provider Type</label>
                    <input type="text" class="form-control" name="provider_type" id="provider_type" placeholder="provider_type" readonly="readonly" value="{{ !empty($provider_types) ? $provider_types[$provider[0]['provider_status']] : ''}}"/>
                </div>
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    @if($provider[0]['provider_status'] == 1)
                    <label id="corporate_label">Corporate</label>
                    <select class="form-control" name="corporate" id="corporate">
                        <option value=''>Corporate</option>
                        @if(!empty($corporates))
                        @foreach($corporates as $key => $value)
                        @if($provider[0]['provider_corporation'] == $value['id'])
                        <option value="{{$value['id']}}" selected="selected">{{ $value['first_name']." ".$value['last_name'] }}</option>
                        @else
                        <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                    @elseif($provider[0]['provider_status'] == 3)
                    <label id="logo_label">Logo</label>
                    <textarea name="zpl_code" id="zpl_code" class="form-control" placeholder="ZPL code">{{!empty($logo) ? $logo[0]->logo : ''}}</textarea>
                    @endif
                </div>
            </div>
            <div class="row">
                @if($provider[0]['provider_status'] == 1 || $provider[0]['provider_status'] == 2)
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label id="client_label">Client</label>
                    <select class="form-control" name="client" id="client">
                        <option value=''>Client</option>
                        @if(!empty($clients))
                        @foreach($clients as $key => $value)
                        @if($provider[0]['client'] == $value['id'])
                        <option value="{{$value['id']}}" selected="selected">{{ $value['first_name']." ".$value['last_name'] }}</option>
                        @else
                        <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                </div>
                @endif
                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                    <label id="client_label">Status</label>
                    <select class="form-control" name="status" id="status">
                        @if(!empty($status))
                        @foreach($status as $key => $value)
                        @if($provider[0]['status'] == $key)
                        <option value="{{$key}}" selected="selected">{{$value}}</option>
                        @else
                        <option value="{{$key}}">{{ $value }}</option>
                        @endif
                        @endforeach
                        @endif
                    </select>
                </div>
            </div>
            <div class="row">
                 <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<label id="client_label">Password</label>
					<input type="text" id="password" name="password" class="form-control" placeholder="Password">
                 </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" class="form-control" name="provider_status" id="provider_status" value="{{ $provider[0]['provider_status'] }}"/>        
                <input type="hidden" name="provider_id" id="provider_id" value="{{$provider[0]['id']}}">
                <input type="submit" class="btn purple-btn btn-sm" value="Save">
            </div>
        </form>
    </div>
    @endif
</div>
@endsection
