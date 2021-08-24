@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Reception'])
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-1 mr-3">
        <span class="sidebar-hide-show tgl-btn"><i class="fa fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        {{ isset($pdf_detail['stage_name']) ? $pdf_detail['stage_name'] : '' }}
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
@section('content')
<div class="tab-pane fade show active order-outer" id="orderReception">
    <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"><span>Total Page: {{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }} </span></div>
        <div clas=""><span ><a href="{{ URL('/orders') }}">Back</a></span></div>
    </div>
    <div class="">
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-1">
                <div id="holder" class="order-thumbnail"></div>
                <canvas id="the-canvas"></canvas>
            </div>
            <div class="col-sm-6 border border-primary">
                <div id="preview-holder" class="border border-primary orderfull-img"></div>
            </div>
            <div class="col-sm-5">
                <div class="order-button custom-scrollbar-css">
                    <div class="row">
                        <div class="col-sm-6">
                            <form class="mb-3 select-state" name="change_stage" method="post" action="{{ URL('/order/changeorderstate/'.$pdf_detail['order_id']) }}">
                                @csrf
                                <select class="form-control" name="change_state" id="change_state" onchange="this.form.submit()">
                                    <option value="" selected="selected" disabled="">Decline</option>
                                    @if(!empty($pdf_detail['status']))
                                    @foreach($pdf_detail['status'] as $key => $value)
                                    <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <input type="hidden" name="order_id" id="order_id" value="{{ $pdf_detail['order_id'] }}">
                            </form>
                        </div>                  
                        <div class="col-sm-6" align="right">
                            <form class="mb-3 select-state" name="change_stage" method="post" action="{{ url('/order/changeorderstate/'.$pdf_detail['order_id']) }}">
                                @csrf
                                <input type="hidden" name="change_state" value="2">
                                <input type="hidden" name="order_id" value="{{ $pdf_detail['order_id'] }}">                                
                                <button class="btn purple-btn btn-sm"  onclick="this.form.submit()">Next Stage</button>
                            </form>
                        </div>
                    </div>
                    <div class="split-btn d-flex mb-3">
                        <a class=" btn purple-btn flex-fill mr-2 btn-sm" href="#" id='splitbutton' role="button">Split</a>
                        <a class="btn purple-btn flex-fill mr-2 btn-sm" href="#" id='mergebutton' role="button">Merge</a>
                        <a class="btn btn-danger flex-fill btn-sm"  href="#" id='deletebutton' role="button">Delete</a>
                    </div>
                    <input type="hidden" name="total_pages" id="total_pages" value="{{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }}">
                    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
                    <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                    <input type="hidden" name="redirect_path" id="redirect_path" value='/order/manage/reception/'/>
                    <input type="hidden" name="file_name" id="file_name" value="{{ isset($pdf_detail['file_name']) ? $pdf_detail['file_name'] : '' }}">
                    <form method="post" id="upload_form" enctype="multipart/form-data" class="mb-3">
                        {{ csrf_field() }}
                        <span class="d-flex file-select">
                            <input type="file"  name="select_file" id="select_file" class="form-control mr-2 choose"  required="required" accept="application/pdf"/>
                            <input type="submit" name="upload" id="upload" class="btn purple-btn btn-sm" value="Upload PDF">
                        </span>
                    </form>
                    <form method="post" action="{{ URL('/order/savemanageorder') }}" class="add-new-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-12">
                                <input type="hidden" name="order_id" id="order_id" value="{{ isset($pdf_detail['order_details'][0]['order_id']) ? $pdf_detail['order_details'][0]['order_id'] : '' }}">
                                <select name='provider' id='provider' class="form-control" required="required" onchange="this.form.submit()">
                                    <option value='' selected disabled>Select Provider</option> 
                                    @if(!empty($pdf_detail['provider_with_address']))
                                    @foreach($pdf_detail['provider_with_address'] as $key => $value)
                                    @if($pdf_detail['order_details'][0]['provider_id'] == $key)
                                    <option value="{{$key}}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-12">
                                <select name='patient' id='patient' class="form-control" required="required" onchange="this.form.submit()">
                                    <option value='' selected disabled>Select Patient</option> 
                                    @if(!empty($pdf_detail['patients']))
                                    @foreach($pdf_detail['patients'] as $key => $value)
                                    @if($pdf_detail['order_details'][0]['patient_id'] == $key)
                                    <option value="{{$key}}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{$key}}">{{ $value }}</option>
                                    @endif
                                    @endforeach 
                                    @endif
                                </select>
                            </div>
                        </div>
                    </form>
                    <!-- Add Provider Modal -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="accor-panel">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <div class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-caret-right"></i> 
                                                    Add Provider
                                                </div>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ URL('/provider/create') }}" method="post" class="add-new-form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>First Name</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Address 1</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1" required="required"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Address 2</label>
                                                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city" id="city" placeholder="City"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>State</label>
                                                            <select class="form-control" name="state" id="state">
                                                                <option value=''>Select State</option>
                                                                @if(!empty($pdf_detail['states']))
                                                                @foreach($pdf_detail['states'] as $key => $value)
                                                                <option value="{{$value['postal_code']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Zip</label>
                                                            <input type="text" class="form-control" name="zip" id="zip" maxlength="5" placeholder="Zip"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Phone</label>
                                                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" maxlength="10"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Fax</label>
                                                            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Provider NPI</label>
                                                            <input type="text" class="form-control" name="npi" id="npi" placeholder="Provider NPI"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Provider Supervisor</label>
                                                            <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Provider Supervisor"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>State License</label>
                                                            <input type="text" class="form-control" name="license" id="license" placeholder="State License"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>DEA</label>
                                                            <input type="text" class="form-control" name="dea" id="dea" placeholder="DEA"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Provider Type</label>
                                                            <select class="form-control" name="provider_type" id="provider_type">
                                                                @if(!empty($pdf_detail['provider_types']))
                                                                @foreach($pdf_detail['provider_types'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['type'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="corporate_label">Corporate</label>
                                                            <label id="logo_label" style="display: none;">Logo</label>
                                                            <select class="form-control" name="corporate" id="corporate">
                                                                <option value=''>Corporate</option>
                                                                @if(!empty($pdf_detail['corporates']))
                                                                @foreach($pdf_detail['corporates'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            <textarea name="zpl_code" id="zpl_code" class="form-control" style="display: none;" placeholder="ZPL code"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="client_label">Client</label>
                                                            <select class="form-control" name="client" id="client">
                                                                <option value=''>Client</option>
                                                                @if(!empty($pdf_detail['clients']))
                                                                @foreach($pdf_detail['clients'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="client_label">Status</label>
                                                            <select class="form-control" name="status" id="status">
                                                                @if(!empty($pdf_detail['provider_status']))
                                                                @foreach($pdf_detail['provider_status'] as $key => $value)
                                                                <option value="{{$key}}">{{$value}}</option>
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
                                                        <input type="hidden" name="order_id" id="order_id" value="{{ isset($pdf_detail['order_details'][0]['order_id']) ? $pdf_detail['order_details'][0]['order_id'] : '' }}">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn purple-btn btn-sm" value="Add Provider">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Patient Modal -->
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <div class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo"><i class="fa fa-caret-right"></i> 
                                                    Add Patient
                                                </div>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form action="{{ URL('/patient/create') }}" method="post" class="add-new-form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Indentification Type</label>
                                                            <select class="form-control" name="identification" id="identification">
                                                                <option value="" disabled="disabled">Indentification</option>
                                                                @if(!empty($pdf_detail['documents']))
                                                                @foreach($pdf_detail['documents'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="dln">Indentification Number</label>
                                                            <input type="text" class="form-control" name="identification_number" id="identification_number" placeholder="Indentification Number">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Additional Indentification Type</label>
                                                            <select class="form-control" name="additional_identification_type" id="additional_identification_type">
                                                                <option value="" disabled="disabled">Additional Indentification</option>
                                                                @if(!empty($pdf_detail['documents']))
                                                                @foreach($pdf_detail['documents'] as $key => $value)
                                                                <option value="{{$value['pmp_code']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="adln">Additional Indentification Number</label>
                                                            <input type="text" class="form-control" name="additional_identification_number" id="additional_identification_number" placeholder="Additional Indentification Number">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Name prefix</label>
                                                            <input type="text" class="form-control" name="name_prefix" id="name_prefix" placeholder="Name Prefix" required="required"/>
                                                        </div>
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Name Suffix</label>
                                                            <input type="text" class="form-control" name="name_suffix" id="name_suffix" placeholder="Name Suffix"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>First Name</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required"/>
                                                        </div>
                                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Middle Name</label>
                                                            <input type="text" class="form-control" name="middle_name" id="middle_name" placeholder="Middle Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Last Name</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" required="required"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>DOB</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="dob" id="dob" placeholder="DOB" required="required"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Gender</label><span style="color:red">*</span>
                                                            <select class="form-control" name="gender" id="gender" required="required">
                                                                <option value=''>Select Gender</option>
                                                                <option value='Male'>Male</option>
                                                                <option value='Female'>Female</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Address 1</label>
                                                            <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Address 2</label>
                                                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city" id="city" placeholder="City"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>State</label>
                                                            <select class="form-control" name="state" id="state">
                                                                <option value=''>Select Sate</option>
                                                                @if(!empty($pdf_detail['states']))
                                                                @foreach($pdf_detail['states'] as $key => $value)
                                                                <option value="{{$value['postal_code']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Zip</label>
                                                            <input type="text" class="form-control" name="zip" id="zip" maxlength="5" placeholder="Zip"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Phone</label>
                                                            <input type="text" class="form-control" name="phone" id="phone" maxlength="10" placeholder="Phone"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Email</label>
                                                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Fax</label>
                                                            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Species</label>
                                                            <select class="form-control" name="species" id="species">
                                                                @if(!empty($pdf_detail['species']))
                                                                @foreach($pdf_detail['species'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['species'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Third Party</label>
                                                            <select class="form-control" name="third_party" id="third_party">
                                                                <option value='cash'>Cash</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Allergies</label>
                                                            <select class="form-control" name="allergies" id="allergies">
                                                                <option value=''>Select Allergies</option>
                                                                @if(!empty($pdf_detail['allergies']))
                                                                @foreach($pdf_detail['allergies'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['description'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Health Conditions</label>
                                                            <select class="form-control" name="health_conditions" id="health_conditions">
                                                                <option value=''>Health Conditions</option>
                                                                @if(!empty($pdf_detail['health']))
                                                                @foreach($pdf_detail['health'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['health'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Auto Refill</label>
                                                            <select class="form-control" name="auto_refill" id="auto_refill">
                                                                <option value='N' selected>No</option>
                                                                <option value='Y'>Yes</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Height</label>
                                                            <input type="number" class="form-control" name="height" id="height" placeholder="Height"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">   
                                                            <label>weight</label>
                                                            <input type="number" class="form-control" name="weight" id="weight" placeholder="Weight"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Tech</label>
                                                            @if(Auth::user()->role == 1 || Auth::user()->role == 2)
                                                            <select name="tech" id="tech" class="form-control">
                                                                <option value="">Select Tech</option>
                                                                @if(!empty($pdf_detail['tech_users']))
                                                                @foreach($pdf_detail['tech_users'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @else
                                                            <select name="tech" id="tech" class="form-control">
                                                                <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                                            </select>
                                                            @endif
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Rph</label>
                                                            @if(Auth::user()->role == 1 || Auth::user()->role ==3)
                                                            <select name="rph" id="rph" class="form-control">
                                                                <option value="">Select Rph</option>
                                                                @if(!empty($pdf_detail['pharm_users']))
                                                                @foreach($pdf_detail['pharm_users'] as $key => $value)
                                                                <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            @else
                                                            <select name="rph" id="rph" class="form-control">
                                                                <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>
                                                            </select>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label id="client_label">Status</label>
                                                            <select class="form-control" name="status" id="status">
                                                                @if(!empty($pdf_detail['provider_status']))
                                                                @foreach($pdf_detail['provider_status'] as $key => $value)
                                                                <option value="{{$key}}">{{$value}}</option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Animal Name</label>
                                                            <input type="text" class="form-control" name="animal_name" id="animal_name" maxlength="255" placeholder="Animal Name"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Country of Non-U.S. Resident</label>
                                                            <input type="text" class="form-control" name="country_of_non_us" id="country_of_non_us" maxlength="255" placeholder="Country of Non-U.S. Resident"/>
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label>Location Code</label>
                                                            <select class="form-control" name="location_code" id="location_code">
                                                                <option value="">Location Code</option>
                                                                @if (!empty($pdf_detail['location_code']))
                                                                    @foreach ($pdf_detail['location_code'] as $key => $value)
                                                                        <option value="{{ $value['code'] }}">{{ $value['name'] }}</option>
                                                                    @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="hidden" name="order_id" id="order_id" value="{{ isset($pdf_detail['order_details'][0]['order_id']) ? $pdf_detail['order_details'][0]['order_id'] : '' }}">
                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn purple-btn btn-sm" value="Add Patient">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Add Patient Modal -->
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                @if(!empty($pdf_detail['prescription']))
                                @foreach($pdf_detail['prescription'] as $key => $val)
                                <div class="col-sm-3">
                                    <a class="accordion-toggle btn purple-btn btn-sm" data-toggle="collapse" data-parent="#accordion" href="{{ '#Rx'.$val['rx_id'] }}" role="button" aria-expanded="false" accesskey="" aria-controls="{{ 'Rx'.$val['rx_id'] }}">{{ $val['rx_id'] }}</a>
                                </div>
                                @endforeach 
                                @endif

                            </div>
                            <div class="row">
                                @if(!empty($pdf_detail['prescription']))
                                @foreach($pdf_detail['prescription'] as $key => $val)
                                <div class="col-sm-12">
                                    <div class="collapse multi-collapse" id="{{ 'Rx'.$val['rx_id'] }}">
                                        <input type="hidden" name="rx_id" id="rx_id" value="{{ $val['id'] }}">
                                        <input type="hidden" name="order_id" id="order_id" value="{{ $val['order_id'] }}">
                                        <input type="hidden" name="delete_rx_url" id="delete_rx_url" value="{{ url('delete/rx') }}">
                                        <div class="card card-body rx-panel">
                                            <div class="row">
                                                <div class="col"> <b>Rx Id: </b>{{ $val['rx_id'] }}</div>
                                                <div class="col"> <b>Order Id: </b>{{ $val['order_id'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Fill Number: </b>{{ $val['rx_fill_number'] }}</div>
                                                <div class="col"> <b>Formula: </b>{{ $val['formula'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Log Id: </b>{{ $val['log_id'] }}</div>
                                                <div class="col"> <b>Schedule: </b>{{ $val['schedule']['code'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Quantity Prescribed:</b>{{ $val['quantity_prescribed'] }}</div>
                                                <div class="col"> <b>Quantity Dispensed: </b>{{ $val['quantity_dispensed'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Units: </b>{{ $val['unit']['code'] }}</div>
                                                <div class="col"> <b>Daw: </b>{{ $val['daw']['description'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Used By Date: </b>{{ date('n/j/Y',strtotime($val['rx_exp_date'])) }}</div>
                                                <div class="col"> <b>Origin: </b>{{ $val['rx_origin']['rx_origin_desc'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Rx Serial No: </b>{{ $val['rx_serial'] }}</div>
                                                <div class="col"> <b>Fill Date: </b>{{ date('n/j/Y',strtotime($val['refill_date'])) }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Date Written: </b>{{ date('n/j/Y',strtotime($val['date_written'])) }}</div>
                                                <div class="col"> <b>Date Entered: </b>{{ date('n/j/Y',strtotime($val['date_entered'])) }}</div>
                                            </div>
                                            <div class="row">        
                                                <div class="col"> <b>Supply: </b>{{ $val['supply'] }}</div>
                                                <div class="col"> <b>SIG: </b>{{ $val['sig'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Price: </b>{{ $val['price'] }}</div>
                                                <div class="col"> <b>State: </b>{{ $val['state']['name'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Third Party: </b>{{ $val['third_party'] }}</div>
                                                <div class="col"> <b>Manufacturer: </b>{{ $val['manufacturer'] }}</div>
                                            </div>
                                            <div class="row">
                                                <div class="col"> <b>Note: </b>{{ $val['product_message'] }}</div>
                                                <div class="col">
                                                    <b>Expire Date: </b>{{ $val['used_by_date'] ? date('n/j/Y',strtotime($val['used_by_date'])) : '' }} 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="row rx-row">
                        <div class="col-sm-12">
                            <form name="note" action="{{ URL('/addnote')}}" method="post">
                                @csrf
                                <textarea name="notes" id="notes" class="form-control btn-sm" placeholder="Enter note..." required="required">{{ !empty($pdf_detail['order_details'][0]['note_details']) ? $pdf_detail['order_details'][0]['note_details']['note'] : '' }}</textarea><br/>
                                @if ($errors->has('notes'))
                                <span style="color:red">{{ $errors->first('notes') }} </span>
                                @endif
                                <input type="hidden" name="order_id" id="order_id" value="{{ $pdf_detail['order_id'] }}"/>
                                <input type="submit" name="save" id="save" class="btn purple-btn btn-sm" value="Save Notes">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('pdfmanipulation_script')
<script src="{!! asset('/public/js/pdfmanipulation.js') !!}"></script>
<script>
                                    $(document).ready(function () {
                                        $("#provider").select2();
                                        $("#patient").select2();
                                        $("#formula").select2();
                                        $("#pk_formula").select2();
                                    });
</script>                                
@stop
