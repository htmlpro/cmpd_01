@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Preverification'])
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
    <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"/></div>
    <div class="d-flex mb-3 back-btn">
        <div class="flex-grow-1 total" style="width:100%"><span>Total Page: {{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }} </span></div>
        <div class=""><span ><a href="{{ URL('/preverification') }}">Back</a></span></div>
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
        <div class="container-fluid">
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
                                <form class="mb-3 select-state" name="decline_change_stage" method="post" action="{{ url('/preverification/changeorderstate/'.$pdf_detail['order_id']) }}">
                                    @csrf 
                                    <input type="hidden" name="order_id" id="order_id" value="{{ $pdf_detail['order_id'] }}">
                                    <input type="hidden" name="rx_id" id="rx_id" value="{{ $pdf_detail['rx_details'][0]['rx_id'] }}">
                                    <input type="hidden" name="chk_note_url" id="chk_note_url" value="{{ url('/checknoteexists') }}">
                                    <select class="form-control" name="change_state" id="change_state" onchange="declineNotes(this.form)">
                                        <option selected="selected" value="" disabled="disabled">Decline</option>
                                        @if(!empty($pdf_detail['status']))
                                        @foreach($pdf_detail['status'] as $key => $value)
                                        <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                </form>
                            </div>
                            <div class="col-sm-6" align="right">
                                <form class="mb-3 select-state" name="change_stage" method="post" action="{{ url('/preverification/changeorderstate/'.$pdf_detail['rx_details'][0]['order_id']) }}">
                                    @csrf
                                    <input type="hidden" name="change_state" value="4">
                                    <input type="hidden" name="order_id" id="order_id" value="{{ $pdf_detail['rx_details'][0]['order_id'] }}">
                                    <input type="hidden" name="rx_id" value="{{ $pdf_detail['rx_details'][0]['rx_id'] }}">                                
                                    <button class="btn purple-btn btn-sm" <?php if(!in_array(Auth()->user()->role, [1, 2])) { echo "disabled"; }?> title="<?php if(!in_array(Auth()->user()->role, [1, 2])) { echo trans('messages.no_approve_permission'); }?>" onclick="this.form.submit()">Approve</button>
                                </form>
                            </div>
                        </div>
                        <div class="row rx-row">
                            <div class="col-sm-6"><b>Provider:</b><br>
                                {{ isset($pdf_detail['provider_name']) ? $pdf_detail['provider_name'] : '' }}
                            </div>
                            <div class="col-sm-6"><b>Patient:</b><br>
                                {{ isset($pdf_detail['patient_name']) ? $pdf_detail['patient_name'] : '' }}
                                <br />
                                <b>DOB:</b> {{ isset($pdf_detail['rx_details'][0]['order']['patient']['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($pdf_detail['rx_details'][0]['order']['patient']['dob']))) : ''  }}
                            </div>
                        </div>
                        <br/>
                        <div class="row rx-row" style="display:none;" id="display_notes_message">
                            <div class="col-sm-12">  
                                <span style="color:red">Please add note before moving back stage, then try to move back stage.</span>
                            </div>
                        </div>
                        <br/>
                        <div class="row rx-row">
                            @if(!empty($pdf_detail['rx_details']))   
                            <div class="col-sm-6"><b>RX#</b><br>
                                {{ $pdf_detail['rx_details'][0]['rx_id'] ? : '' }}
                            </div>
                            <div class="col-sm-6"><b>LOG ID/NDC:</b><br>
                                {{ isset($pdf_detail['rx_details'][0]['log_id']) ? $pdf_detail['rx_details'][0]['log_id'] : ''}} 
                            </div>
                            @endif
                        </div> 
                        <div class="row rx-row"> 
                            @if(!empty($pdf_detail['rx_details']))   
                            <div class="col-sm-6"> 
                                <b>Formula :</b><br/> {{!empty($pdf_detail['formula_name']) ? ucwords(strtolower($pdf_detail['formula_name'])) : ''}}
                            </div>
                            <div class="col-sm-6">
                                <b>Formula#: </b><br/>{{ !empty($pdf_detail['rx_details'][0]['formula']) ? $pdf_detail['rx_details'][0]['formula'] : '' }} 
                            </div>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="accor-panel">
                                    <div class="accordion" id="accordionExample">
                                        <div class="card">
                                            <div class="card-header" id="headingOne">
                                                <h5 class="mb-0">
                                                    <div class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne"><i class="fa fa-caret-right"></i> 
                                                        View Rx Details
                                                    </div>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                                <div class="card card-body rx-panel">
                                                    @if(!empty($pdf_detail['rx_details']))
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Rx Id: </b>{{ !empty($pdf_detail['rx_details'][0]['rx_id']) ? $pdf_detail['rx_details'][0]['rx_id'] : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>Order Id: </b>{{ !empty($pdf_detail['rx_details'][0]['order_id']) ? $pdf_detail['rx_details'][0]['order_id'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Authorized Refill#: </b>{{ !empty($pdf_detail['rx_details'][0]['refill_allowed']) ? $pdf_detail['rx_details'][0]['refill_allowed']['refill_allowed']: '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>Remaining Refill#: </b>{{ !empty($pdf_detail['rx_details'][0]['refill_allowed']) ? $pdf_detail['rx_details'][0]['refill_allowed']['remaining_refill'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Fill Number: </b>{{ isset($pdf_detail['rx_details'][0]['rx_fill_number']) ? $pdf_detail['rx_details'][0]['rx_fill_number'] : '' }}
                                                        </div>
                                                        <div class="col">
                                                            <b>Formula#: </b>{{ !empty($pdf_detail['rx_details'][0]['formula']) ? $pdf_detail['rx_details'][0]['formula'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>LOG ID/NDC: </b>{{ !empty($pdf_detail['rx_details'][0]['log_id']) ? $pdf_detail['rx_details'][0]['log_id'] : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>LOT Number: </b>{{ !empty($pdf_detail['lot_number']) ? $pdf_detail['lot_number'] : 'NA' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Quantity Prescribed:</b>{{ !empty($pdf_detail['rx_details'][0]['quantity_prescribed']) ? $pdf_detail['rx_details'][0]['quantity_prescribed'] : '' }}
                                                        </div>
                                                        <div class="col">
                                                            <b>Quantity Dispensed: </b>{{ !empty($pdf_detail['rx_details'][0]['quantity_dispensed']) ? $pdf_detail['rx_details'][0]['quantity_dispensed'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Units: </b>{{ !empty($pdf_detail['rx_details'][0]['unit']['code']) ? $pdf_detail['rx_details'][0]['unit']['code'] : '' }}
                                                        </div>
                                                        <div class="col">
                                                            <b>Daw: </b>{{ !empty($pdf_detail['rx_details'][0]['daw']['description']) ? $pdf_detail['rx_details'][0]['daw']['description'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Schedule: </b>{{ !empty($pdf_detail['rx_details'][0]['schedule']['code']) ? $pdf_detail['rx_details'][0]['schedule']['code'] : '' }}   
                                                        </div>
                                                        <div class="col">
                                                            <b>Origin: </b>{{ !empty($pdf_detail['rx_details'][0]['rx_origin']['rx_origin_desc']) ? $pdf_detail['rx_details'][0]['rx_origin']['rx_origin_desc'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <b>Fill Date: </b>{{ !empty($pdf_detail['rx_details'][0]['refill_date']) ? date('n/j/Y',strtotime($pdf_detail['rx_details'][0]['refill_date'])) : '' }}
                                                        </div>
                                                        <div class="col">
                                                            <b>Used By Date: </b>{{ !empty($pdf_detail['rx_details'][0]['rx_exp_date']) ? date('n/j/Y',strtotime($pdf_detail['rx_details'][0]['rx_exp_date'])) : '' }} 
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>Date Written: </b>{{ !empty($pdf_detail['rx_details'][0]['date_written']) ? date('n/j/Y',strtotime($pdf_detail['rx_details'][0]['date_written'])) : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>Date Entered: </b>{{ !empty($pdf_detail['rx_details'][0]['date_entered']) ? date('n/j/Y',strtotime($pdf_detail['rx_details'][0]['date_entered'])) : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">        
                                                        <div class="col"> 
                                                            <b>Supply: </b>{{ !empty($pdf_detail['rx_details'][0]['supply']) ? $pdf_detail['rx_details'][0]['supply'] : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>SIG: </b>{{ !empty($pdf_detail['rx_details'][0]['sig']) ? $pdf_detail['rx_details'][0]['sig'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>Price($): </b>{{ !empty($pdf_detail['rx_details']) ?$pdf_detail['rx_details'][0]['price'] : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>Total Price($): </b>{{ !empty($pdf_detail['rx_details']) ?$pdf_detail['rx_details'][0]['total_price'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>Third Party: </b>{{ !empty($pdf_detail['rx_details'][0]['third_party']) ? $pdf_detail['rx_details'][0]['third_party'] : '' }}
                                                        </div>
                                                        <div class="col"> 
                                                            <b>Manufacturer: </b>{{ !empty($pdf_detail['rx_details'][0]['manufacturer']) ? $pdf_detail['rx_details'][0]['manufacturer'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>State: </b>{{ !empty($pdf_detail['rx_details'][0]['state']) ? $pdf_detail['rx_details'][0]['state']['name'] : '' }}
                                                        </div>
                                                        <div class="col">
                                                            <b>Expire Date: </b>{{ !empty($pdf_detail['rx_details'][0]['used_by_date']) ? date('n/j/Y',strtotime($pdf_detail['rx_details'][0]['used_by_date'])) : '' }} 
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>Rx Serial No: </b>{{ !empty($pdf_detail['rx_details'][0]['rx_serial']) ? $pdf_detail['rx_details'][0]['rx_serial'] : '' }}                                                   
                                                        </div>
                                                        <div class="col">
                                                            <b>Product Message: </b>{{ !empty($pdf_detail['rx_details'][0]['product_message']) ? $pdf_detail['rx_details'][0]['product_message'] : '' }}
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col"> 
                                                            <b>Authorized Refill: </b>0
                                                        </div>
                                                        <div class="col">
                                                            <b>Remaining Refill: </b>0
                                                        </div>
                                                    </div>
                                                    @endif
                                                </div> 
                                            </div>
                                        </div> <!-- ./Add New Rx Card-->
                                        <div class="card">
                                            <div class="card-header" id="headingTwo">
                                                <h5 class="mb-0">
                                                    <div class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-caret-right"></i> 
                                                        View chemical Details
                                                    </div>
                                                </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card card-body rx-panel">
                                                    @if(!empty($pdf_detail['chemicals']))
                                                    <div class="row">
                                                        <div class="col-sm-6"><b>Ingredients Count:</b>{{ count($pdf_detail['chemicals']) }}</div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-sm-6"><b>Chemical</b></div>
                                                        <div class="col-sm-3"><b>Quantity</b></div>
                                                        <div class="col-sm-3"><b>LOT Number ExpDate</b></div>
                                                    </div>
                                                    @foreach($pdf_detail['chemicals'] as $key => $val)
                                                    <div class="row">
                                                        <div class="col-sm-6">{{$val['NAME']}}</div>
                                                        <div class="col">{{$val['QUANTITY_USED']}}</div>
                                                        <div class="col">{{date('n/j/Y',strTotime($val['EXP_DATE']))}}</div>
                                                    </div>
                                                    @endforeach
                                                    @else
                                                    {{"No record found!"}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div> <!-- ./ Chemical Details Card-->
                                        <div class="card">
                                            <div class="card-header" id="headingThree">
                                                <h5 class="mb-0">
                                                    <div class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree"><i class="fa fa-caret-right"></i> 
                                                        Dispatch Details
                                                    </div>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                                <div class="card-body">
                                                    <form method="post" action="{{ url('dispatch/save') }}" class="add-new-form">
                                                        <input type="hidden" name="total_pages" id="total_pages" value="{{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }}">
                                                        <input type="hidden" name="dispatch_order_id" id="dispatch_order_id" value="{{ $pdf_detail['order_id'] }}">
                                                        <input type="hidden" name="dispatch_rx_id" id="dispatch_rx_id" value="{{ $pdf_detail['rx_details'][0]['rx_id'] }}">
                                                        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="dispatch_url" id="dispatch_url" value="{{ URL('dispatch') }}">
                                                        <input type="hidden" name="dispatch_to_patient_id" id="dispatch_to_patient_id" value="{{ $pdf_detail['rx_details'][0]['order']['patient_id'] }}">
                                                        <input type="hidden" name="dispatch_to_provider_id" id="dispatch_to_provider_id" value="{{ $pdf_detail['rx_details'][0]['order']['provider_id'] }}">
                                                        <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                                                        <input type="hidden" name="redirect_to" id="redirect_to" value='preverification'/>
                                                        <input type="hidden" name="file_name" id="file_name" value="{{ isset($pdf_detail['file_name']) ? $pdf_detail['file_name'] : '' }}">
                                                        <div class="row">
                                                            <div class="col-sm-12 dispatch-radio">  
                                                                <span>Dispatch to:</span>
                                                                <input type="radio"  name="dispatch_to" value="Provider" {{ ($pdf_detail['dispatch_details']['dispatch_to_type']== 'Provider') ? "checked" : '' }}><label for="Provider">&nbsp;Provider</label><br>
                                                                <input type="radio"  name="dispatch_to" value="Patient" {{ ($pdf_detail['dispatch_details']['dispatch_to_type']== 'Patient') ? "checked" : '' }}><label for="Patient">&nbsp;Patient</label><br>
                                                            </div>
                                                            <div class="col col-xs-4"></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>First Name</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="dispatch_first_name" id="dispatch_first_name" placeholder="First Name" value="{{ isset($pdf_detail['dispatch_details']['first_name']) ? $pdf_detail['dispatch_details']['first_name'] : ''}}" required="required">
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Last Name</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="dispatch_last_name" id="dispatch_last_name" placeholder="Last Name" value="{{ isset($pdf_detail['dispatch_details']['last_name']) ? $pdf_detail['dispatch_details']['last_name'] : ''}}" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Address 1</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="dispatch_address_1" id="dispatch_address_1" placeholder="Address2" value="{{ isset($pdf_detail['dispatch_details']['address1']) ? $pdf_detail['dispatch_details']['address1'] : ''}}" required="required">           
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Address 2</label>
                                                                <input type="text" class="form-control" name="dispatch_address_2" id="dispatch_address_2" placeholder="Address2" value="{{ isset($pdf_detail['dispatch_details']['address2']) ? $pdf_detail['dispatch_details']['address2'] : ''}}">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>City</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control" name="dispatch_city" id="dispatch_city" placeholder="City" value="{{ isset($pdf_detail['dispatch_details']['city']) ? $pdf_detail['dispatch_details']['city'] : ''}}" required="required">
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>State</label><span style="color:red">*</span>
                                                                <select class="form-control" name="dispatch_state" id="dispatch_state" required="required"> 
                                                                    <option value="">Select State</option>
                                                                    @if(!empty($pdf_detail['state']))
                                                                    @foreach($pdf_detail['state'] as $key => $value)
                                                                    @if($pdf_detail['dispatch_details']['state'] == $value['postal_code'])
                                                                    <option value="{{$value['postal_code']}}" selected> {{$value['name']}} </option>
                                                                    @else
                                                                    <option value="{{$value['postal_code']}}"> {{$value['name']}} </option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Zip</label><span style="color:red">*</span>
                                                                <input type="text" maxlength="5" class="form-control" name="dispatch_zip" id="dispatch_zip" placeholder="Zip" value="{{ isset($pdf_detail['dispatch_details']['zip']) ? $pdf_detail['dispatch_details']['zip'] : ''}}" required="required">
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Phone</label><span style="color:red">*</span>
                                                                <input type="text" maxlength="10" class="form-control" name="dispatch_phone" id="dispatch_phone" placeholder="Phone" value="{{ isset($pdf_detail['dispatch_details']['phone']) ? $pdf_detail['dispatch_details']['phone'] : ''}}" required="required">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Fax</label>
                                                                <input type="text" maxlength="10" class="form-control" name="dispatch_fax" id="dispatch_fax" placeholder="Fax" value="{{ isset($pdf_detail['dispatch_details']['fax']) ? $pdf_detail['dispatch_details']['fax'] : ''}}"/>
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Email</label>
                                                                <input type="email" class="form-control" name="dispatch_email" id="dispatch_email" placeholder="Email" value="{{ isset($pdf_detail['dispatch_details']['email']) ? $pdf_detail['dispatch_details']['email'] : ''}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                                <label>Dispatch Method</label><span style="color:red">*</span>
                                                                <select class="form-control" name="dispatch_method" id="dispatch_method" required="required"> 
                                                                    <option selected="true" disabled="disabled">Dispatch Method</option>
                                                                    @if(!empty($pdf_detail['method_data']))
                                                                    @foreach($pdf_detail['method_data'] as $key => $value)
                                                                    @if($pdf_detail['dispatch_details']['dispatch_method'] == $value['id'])
                                                                    <option value="{{$value['id']}}" selected> {{$value['dispatch_method']}} </option>
                                                                    @else
                                                                    <option value="{{$value['id']}}"> {{$value['dispatch_method']}} </option>
                                                                    @endif
                                                                    @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                            <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6"></div>
                                                        </div>
                                                        <div class="clear-fix"></div>
                                                        <div class="modal-footer">
                                                            <input type="submit" class="bbtn purple-btn btn-sm" value="Save">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div> <!-- ./Dispatch --> 
                                        </div> <!-- ./Dispatch Card -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clear-fix"></div>
                        <br>
                        <div class="row" rx-row>
                            @if(!empty($pdf_detail['rx_details'][0]['log_id']))
                            @if((empty($pdf_detail['therapeutic_class']) || $pdf_detail['therapeutic_class'] != "ALLERGY TREATMENT"))
                            <div class="col-sm-6">
                               @if(!empty($pdf_detail['rx_details'][0]['formula']))
                                        <a href="{{ url('cmpdlabelprint'.'/'.$pdf_detail['rx_details'][0]['order_id'].'/'.$pdf_detail['rx_details'][0]['rx_id'].'/'.$pdf_detail['rx_details'][0]['formula']) }}"  class="btn purple-btn btn-sm"  target="_blank" name="printlabel" id="printlabel">Print Label</a>
                                        @else
                                        <a href="javascript:void(0)" class="btn purple-btn btn-sm">Print Label</a>
                                        @endif
                            </div>
                            @elseif($pdf_detail['therapeutic_class'] == "ALLERGY TREATMENT")
                            <div class="col-sm-6">
                                <a href="{{ url('printlabel'.'/'.$pdf_detail['rx_details'][0]['order_id'].'/'.$pdf_detail['rx_details'][0]['rx_id'].'/'.$pdf_detail['rx_details'][0]['log_id']) }}"  class="btn purple-btn btn-sm"  target="_blank" name="printlabel" id="printlabel">Print Label</a>
                            </div>
                            @endif
                            <div class="col-sm-6">        
                                <a href="{{ url('printworksheet'.'/'.$pdf_detail['rx_details'][0]['order_id'].'/'.$pdf_detail['rx_details'][0]['rx_id'].'/'.$pdf_detail['rx_details'][0]['log_id']) }}" class="btn purple-btn btn-sm"  target="_blank" name="printworksheet" id="printworksheet">Print Worksheet</a>
                            </div>
                            @else
                            <div class="col-sm-6">
                                <a href="javascript:void(0)" class="btn purple-btn btn-sm">Print Label</a>
                            </div>
                            <div class="col-sm-6">
                                <a href="javascript:void(0)" class="btn purple-btn btn-sm">Print Worksheet</a>
                            </div>
                            @endif
                        </div> 
                        <br/>
                        <div class="row rx-row">
                            <div class="col-sm-12">
                                <form name="note" action="{{ URL('/addnote')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ !empty($pdf_detail['order_id']) ? $pdf_detail['order_id'] : '' }}">
                                    <input type="hidden" name="rx_id" value="{{ !empty($pdf_detail['rx_details'][0]['rx_id']) ? $pdf_detail['rx_details'][0]['rx_id'] : '' }}">
                                    <textarea name="notes" id="notes" class="form-control btn-sm" placeholder="Enter Note">{{ !empty($pdf_detail['rx_details'][0]['order']['note_details']) ? $pdf_detail['rx_details'][0]['order']['note_details']['note'] : '' }}</textarea><br/>
                                    @if ($errors->has('notes'))
                                    <span style="color:red">{{ $errors->first('notes') }} </span>
                                    @endif
                                    <input type="submit" name="save" id="save" class="btn purple-btn btn-sm" value="Save Notes" align="right">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!--#/orderReception -->
@endsection
@section('pdfmanipulation_script')
<script src="{!! asset('/public/js/pdfmanipulation.js') !!}"></script>
@stop