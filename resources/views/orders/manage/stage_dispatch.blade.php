@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Dispatch'])
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
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"></div>
        <div clas=""><span ><a href="{{ URL('/dispatch') }}">Back</a></span></div>
    </div>
</div>
<div class="tab-pane fade show active" id="orderFilling">
    <div class="p-3">
        <div class="clearfix"></div>
        @if(Session::has('message'))
        <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-9"></div>
        <div class="col-sm-3">
            <form class="mb-3 select-state">
                <select class="form-control" name="change_stage" id="dispatch_change_state" onchange="declineNotes(this.form)">
                    <option value="">Decline</option>
                    @if(!empty($dispatch['status']))
                    @foreach($dispatch['status'] as $key => $value)
                    <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                    @endforeach
                    @endif
                </select>
                <input type="hidden" name="current_stage" id="current_stage" value="7">
            </form>
        </div>
    </div>

    <div class="grid-outer">
        <form id="dispatch_form" method="post" action="{{ url('/orderdispatch') }}" class="add-new-form">
            <table class="table" style="width:100%;font-size:11px;">
                <thead>
                    <tr id="table_tr">
                        <th data-id="date_received" width="90px">Date Received</th>
                        <th data-id="order_num" width="75px">Order No.</th>
                        <th data-id="provider" width="100px">Provider</th>
                        <th data-id="date_entered" width="100px">Date Entered</th>
                        <th data-id="rx" width="75x">Rx</th>
                        <th data-id="patient" width="104px">Patient</th>
                        <th data-id="dob" width="90px">DOB</th>
                        <th data-id="medication" width="100px">Medication</th>
                        <th data-id="client" width="70px">Client</th>
                        <th data-id="ship_to" width="70px">Ship To</th>
                        <th data-id="dispatch_method" width="70px">Dispatch Method</th>
                    </tr>
                </thead>
                <tbody>
                    @php ($total_price = 0)
                    @if(!empty($dispatch['order_pres_details']))
                    @foreach($dispatch['order_pres_details'] as $keys => $value)
                    @foreach($value as $key => $val)
                    <tr>
                <input type="checkbox" name="rx[]" id="rx[]" value="{{$val['rx_id'].'-'.$val['order_id']}}" checked="checked" style="display: none;"/>       
                <input type="hidden" name="order[]" id="order[]" value="{{ $val['order_id'] }}" />
                <td>{{ isset($val['order']['created_at']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
                <td>{{ isset($val['order']['order_id']) ? $val['order']['order_id'] : '' }}</td>
                <td>{{ isset($val['order']['provider_id']) ? $val['order']['provider']['first_name'].' '.$val['order']['provider']['last_name'] : '' }}</td>
                <td>{{ isset($val['date_entered']) ? date('n/j/Y',strTotime($val['date_entered'])) : '' }}</td>
                <td>{{ isset($val['rx_id']) ? $val['rx_id'] : '' }}</td>
                <td>{{ isset($val['order']['patient_id']) ? Crypt::decrypt($val['order']['patient']['first_name']).' '.Crypt::decrypt($val['order']['patient']['last_name']) : '' }}</td>
                <td>{{ isset($val['order']['patient_id']) ? date('n/j/Y',strtotime(Crypt::decrypt($val['order']['patient']['dob']))) : '' }}</td>
                <td>{{ !empty($val['formula']) ? (!empty($dispatch['formula_data']) ? strtoupper($dispatch['formula_data'][$val['formula']]) : '') : '' }}</td>
                <td>{{ isset($val['order']['client_id']) ? (!empty($dispatch['provider_data']) ? strtoupper($dispatch['provider_data'][$val['order']['client_id']]) : '') : '' }}</td>
                <td>{{ !empty($val['dispatch']) ? strtoupper($val['dispatch'][0]['dispatch_to_type']) :'' }}</td>
                <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['dispatch_method']['dispatch_method'] : '' }}</td>
                @php ($total_price = $total_price + $val['total_price'])
                </tr>
                @endforeach
                @endforeach
                @endif
                </tbody>
            </table>
            <div class="card-body">
                <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/>
                <input type="hidden" name="dispatch_url" id="dispatch_url" value="{{ URL('dispatch') }}">
                <input type="hidden" name="dispatch_order_id" id="dispatch_order_id" value="{{$dispatch['order_pres_details'] ? $dispatch['order_pres_details'][0][0]['order_id'] : ''}}">
                <input type="hidden" name="dispatch_to_patient_id" id="dispatch_to_patient_id" value="{{$dispatch['order_pres_details'] ? $dispatch['order_pres_details'][0][0]['order']['patient_id'] : '' }}"/>
                <input type="hidden" name="dispatch_to_provider_id" id="dispatch_to_provider_id" value="{{$dispatch['order_pres_details'] ? $dispatch['order_pres_details'][0][0]['order']['provider_id'] : '' }}"/>
                <div class="row">
                    <div class="col-sm-12 dispatch-radio">  
                        <span>Dispatch to:</span>
                        {{-- {{ $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type']}}{{die()}} --}}
                        <input type="radio"  name="dispatch_to" value="Provider" required class="dispatch_to" {{ (!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type'] == 'Provider') ? "checked" : '' }}><label for="Provider">&nbsp;Provider</label>
                        <input type="radio"  name="dispatch_to" value="Patient" required class="dispatch_to" {{ (!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type'] == 'Patient') ? "checked" : '' }}><label for="Patient">&nbsp;Patient</label>
                        <input type="radio"  name="dispatch_to" value="Other" required class="dispatch_to" {{ (!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type'] == 'Other') ? "checked" : '' }}><label for="Other">&nbsp;Other</label><br>

                    </div>
                    <div class="col col-xs-4"></div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>First Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_first_name" id="dispatch_first_name" placeholder="First Name" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch'])?$dispatch['order_pres_details'][0][0]['dispatch'][0]['first_name']:''}}" required="required">
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Last Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_last_name" id="dispatch_last_name" placeholder="Last Name" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch'])?$dispatch['order_pres_details'][0][0]['dispatch'][0]['last_name']:''}}" required="required">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Address 1</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_address_1" id="dispatch_address_1" placeholder="Address1" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch'])?$dispatch['order_pres_details'][0][0]['dispatch'][0]['address1']:''}}" required="required">  
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Address 2</label>
                        <input type="text" class="form-control" name="dispatch_address_2" id="dispatch_address_2" placeholder="Address2" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch'])?$dispatch['order_pres_details'][0][0]['dispatch'][0]['address2'] : ''}}">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>City</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_city" id="dispatch_city" placeholder="City" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch'])?$dispatch['order_pres_details'][0][0]['dispatch'][0]['city'] : ''}}" required="required">
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>State</label><span style="color:red">*</span>
                        <select class="form-control" name="dispatch_state" id="dispatch_state" required="required"> 
                            <option value="">State</option>   
                            @if(!empty($dispatch['state_data']))
                            @foreach($dispatch['state_data'] as $key => $value)
                            @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']))
                            @if($dispatch['order_pres_details'][0][0]['dispatch'][0]['state'] == $key)
                            <option value="{{$key}}" selected> {{$value}} </option>
                            @endif
                            @endif
                            <option value="{{$key}}"> {{$value}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Zip</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_zip" id="dispatch_zip" maxlength="5" placeholder="Zip"  value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['zip'] : ''}}" required="required">
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Phone</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dispatch_phone" maxlength="10" id="dispatch_phone" placeholder="Phone" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['phone'] : ''}}" required="required">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Fax</label>
                        <input type="text" maxlength="10" class="form-control" name="dispatch_fax" id="dispatch_fax" placeholder="Fax" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['fax'] : ''}}">
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Email</label>
                        <input type="email" class="form-control" name="dispatch_email" id="dispatch_email" placeholder="Email" value="{{ !empty($dispatch['order_pres_details'][0][0]['dispatch']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['email'] : ''}}" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Dispatch Method</label><span style="color:red">*</span>
                        <select class="form-control" name="dispatch_method" id="dispatch_method" required="required" onchange="getCourierDetails(this.value)"> 
                            <option value="" selected disabled>Dispatch Method</option>
                            @if(!empty($dispatch['method_data']))
                            @foreach($dispatch['method_data'] as $key => $value)
                            @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']))
                            @if($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == $key)
                            <option value="{{$key}}" selected> {{$value}} </option>
                            @endif
                            @endif
                            <option value="{{$key}}"> {{$value}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Service Type</label><span style="color:red">*</span>
                        <select class="form-control" name="service_type" id="service_type" required="required">  
                            <option value="" disabled>Service Type</option>
                            @if(!empty($dispatch['service_type']))
                            @foreach($dispatch['service_type'] as $key => $value)
                            <option value="{{$value['id']}}"> {{$value['service_type']}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-3">
                        <label>Weight</label><span style="color:red">*</span>
                        <input type="tex" name="weight" id="weight" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['weight']:''}}" class="form-control"  onkeyup="checkDec(this);" required="required"/>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-3">
                        <label>Unit</label><span style="color:red">*</span>
                        <select class="form-control" name="unit" id="unit">
                            <option value="" disabled="">Unit</option>
                            @if(!empty($dispatch['weight_unit']))
                            @foreach($dispatch['weight_unit'] as $key => $value)
                            <option value="{{$value['id']}}"> {{$value['code']. " ".$value['description']}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Package Type</label><span style="color:red">*</span>
                        <select class="form-control" name="package_type" id="package_type" required="required">  
                            <option value="" disabled>Package Type</option>
                            @if(!empty($dispatch['package_type']))
                            @foreach($dispatch['package_type'] as $key => $value)
                            <option value="{{$value['id']}}"> {{$value['package_type']}} </option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Total Price</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="total_price" id="total_price" placeholder="Price" value="<?= $total_price ? $total_price : 0 ?>" readonly="readonly"/>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Delivery Price</label><span style="color:red">*</span>
                        <input type="text" class="form-control" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['delivery_price']:''}}" name="delivery_price" id="delivery_price" placeholder="Delivery Price" onkeyup="checkDec(this);" required="required"/>
                    </div>
                </div>
            <div class="row other_show {{(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type'] == 'Other')?'':'d-none'}}">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>ID Qualifier of Person Dropping Off or Picking Up Rx</label><span style="color:red">*</span>
                        <select class="form-control other_req" name="person_drop_id_indentification" id="person_drop_id_indentification">
                            <option value="">Indentification</option>
                            <option value="01" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='01') selected @endif>Military ID</option>
                            <option value="02" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='02') selected @endif>State Issued ID</option>
                            <option value="03" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='03') selected @endif>Unique System ID</option>
                            <option value="04" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='04') selected @endif>Permanent Resident Card (Green Card)</option>
                            <option value="05" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='05') selected @endif>Passport ID</option>
                            <option value="06" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='06') selected @endif>Driver’s License ID</option>
                            <option value="07" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='07') selected @endif>Social Security Number</option>
                            <option value="08" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='08') selected @endif>Tribal ID</option>
                            <option value="99" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification']=='99') selected @endif>Other (agreed upon ID)</option>

                        </select>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>ID of Person Dropping Off or Picking Up Rx</label><span style="color:red">*</span>
                    <input type="text" class="form-control other_req" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'])? $dispatch['order_pres_details'][0][0]['dispatch'][0]['person_drop_id_indentification_number']:''}}" name="person_drop_id_indentification_number" id="person_drop_id_indentification_number" placeholder="ID of Person Dropping Off or Picking Up Rx"/>
                    </div>
                </div>
                <div class="row other_show {{(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_to_type'] == 'Other')?'':'d-none'}}">
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Relationship of Person Dropping Off or Picking Up Rx</label><span style="color:red">*</span>
                        <select class="form-control other_req" name="relationship_person_dropping_id" id="relationship_person_dropping_id">
                            <option value="">Select Relationship of Person Dropping Off</option>
                            <option value="01" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['relationship_person_dropping_id']=='01') selected @endif>Patient</option>
                            <option value="02" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['relationship_person_dropping_id']=='02') selected @endif> Parent/Legal Guardian</option>
                            <option value="03" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['relationship_person_dropping_id']=='03') selected @endif>Spouse</option>
                            <option value="04" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['relationship_person_dropping_id']=='04') selected @endif>Caregiver</option>
                            <option value="99" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['relationship_person_dropping_id']=='99') selected @endif>Other</option>
                        </select>
                    </div>
                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                        <label>Dropping Off/Picking Up Identifier Qualifier</label><span style="color:red">*</span>
                        <select class="form-control other_req" name="additional_person_drop_id_indentification" id="additional_person_drop_id_indentification">
                            <option value="">Select Dropping Identifier Qualifier</option>
                            <option value="01" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['additional_person_drop_id_indentification']=='01') selected @endif>Person Dropping Off</option>
                            <option value="02" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['additional_person_drop_id_indentification']=='02') selected @endif>Person Picking Up</option>
                            <option value="03" @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && $dispatch['order_pres_details'][0][0]['dispatch'][0]['additional_person_drop_id_indentification']=='03') selected @endif>Unknown/Not Applicable</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 1))
                    <div id="div_dimesion_l" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                        @else 
                        <div id="div_dimesion_l" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                            @endif
                            <label>Dimension(L)</label><span style="color:red">*</span>
                        <input type="text" name="dimension_l" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['dimension_l']:''}}" id="dimension_l" class="form-control" onkeyup="checkDec(this);"/> 
                        </div>
                        @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 1))
                        <div id="div_dimesion_w" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                            @else
                            <div id="div_dimesion_w" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                                @endif
                                <label>Dimension(W)</label><span style="color:red">*</span>
                                <input type="text" name="dimension_w" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['dimension_w']:''}}" id="dimension_w" class="form-control" onkeyup="checkDec(this);"/>    
                            </div>
                            @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 1))
                            <div id="div_dimesion_h" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                                @else
                                <div id="div_dimesion_h" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-2">
                                    @endif   
                                    <label>Dimension(H)</label><span style="color:red">*</span>
                                    <input type="text" name="dimension_h" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['dimension_h']:''}}" id="dimension_h" class="form-control" onkeyup="checkDec(this);"/>                    
                                </div>
                                @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 1))
                                <div id="div_fedex_tracking" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                    @else
                                    <div id="div_fedex_tracking" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        @endif
                                        <label>FEDEX Tracking</label><span style="color:red">*</span>
                                        <input type="text" name="fedex_tracking" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['tracking']:''}}" id="fedex_tracking" class="form-control"/>                    
                                    </div>
                                    @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 2))
                                    <div id="div_ups_tracking" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        @else
                                        <div id="div_ups_tracking" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                            @endif   
                                            <label>USPS Tracking</label><span style="color:red">*</span>
                                            <input type="text" name="ups_tracking" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['tracking']:''}}" id="ups_tracking" class="form-control"/>                    
                                        </div>
                                        @if(!empty($dispatch['order_pres_details'][0][0]['dispatch']) && ($dispatch['order_pres_details'][0][0]['dispatch'][0]['dispatch_method']['id'] == 3))
                                        <div id="div_order_id" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                            @else
                                            <div id="div_order_id" style="display: none;" class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                @endif   
                                                <label>Order Id</label><span style="color:red">*</span>
                                                <input type="text" name="order_id" value="{{!empty($dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']) ? $dispatch['order_pres_details'][0][0]['dispatch'][0]['invoice']['order_id']:''}}" id="order_id" class="form-control"/>            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clear-fix"></div>
                                    <div class="row">
                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6"></div>
                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6" align="right">
                                            <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                                            <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}"/>
                                            <input type="submit" class="btn purple-btn btn-sm" name="dispatchorder" id="dispatchorder" value="Next Stage"/></div>
                                    </div>
                                    </form>
                                    <div class="row">
                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6"></div>
                                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6" >
                                            <form name="note" action="{{ URL('/addnote')}}" method="post" class="add-new-form">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ !empty($pdf_detail['order_details'][0]['order_id']) ? $pdf_detail['order_details'][0]['order_id'] : '' }}">
                                                <textarea name="notes" id="notes" class="form-control btn-sm" placeholder="Enter Note">{{ !empty($pdf_detail['order_details'][0]['note_details']) ? $pdf_detail['order_details'][0]['note_details']['note'] : '' }}</textarea><br/>
                                                @if ($errors->has('notes'))
                                                <span style="color:red">{{ $errors->first('notes') }} </span>
                                                @endif 
                                                <div align="right">
                                                    <input type="submit" name="save" id="save" class="btn purple-btn btn-sm foat-right" value="Save Notes">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endsection
