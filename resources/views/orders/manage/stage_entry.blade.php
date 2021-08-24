@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Order Entry'])
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
        <div class="flex-grow-1 total" style="width:100%"><span>Total Page: {{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }} </span></div>
        <div class=""><span><a href="{{ url('/entry') }}">Back</a></span></div>
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
                            <form class="mb-3 select-state" name="decline_change_stage" method="post" action="{{ url('/entry/changeorderstate/'.$pdf_detail['order_id']) }}">
                                @csrf
                                <input type="hidden" name="order_id" id="order_id" value="{{ $pdf_detail['order_id'] }}">
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
                            <form class="mb-3 select-state" name="change_stage" method="post" action="{{ url('/entry/changeorderstate/'.$pdf_detail['order_id']) }}">
                                @csrf
                                <input type="hidden" name="change_state" value="3">
                                <input type="hidden" name="order_id" value="{{ $pdf_detail['order_id'] }}">                                
                                <button class="btn purple-btn btn-sm"  onclick="this.form.submit()">Next Stage</button>
                            </form>
                        </div>
                    </div>
                    <input type="hidden" name="total_pages" id="total_pages" value="{{ isset($pdf_detail['total_pages']) ? $pdf_detail['total_pages'] : '' }}">
                    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
                    <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                    <input type="hidden" name="file_name" id="file_name" value="{{ isset($pdf_detail['file_name']) ? $pdf_detail['file_name'] : '' }}">
                    <input type="hidden" name="redirect_path" id="redirect_path" value='/order/manage/entry/'/>
                    <form method="post" id="upload_form" enctype="multipart/form-data" class="mb-3">
                        {{ csrf_field() }}
                        <span class="d-flex file-select">
                            <input type="file"  name="select_file" id="select_file" class="form-control mr-2 choose"  required="required"/>
                            <input type="hidden" name="orderid" id="orderid" value="{{ $pdf_detail['order_details'][0]['order_id'] }}">
                            <input type="submit" name="upload" id="upload" class="btn purple-btn btn-sm" value="Upload PDF">
                        </span>
                    </form>
                    <div class="row rx-row">
                        <div class="col-sm-6"><b>Provider:</b><br>
                            {{ isset($pdf_detail['provider_name']) ? $pdf_detail['provider_name'] : '' }}
                        </div>
                        <div class="col-sm-6"><b>Patient:</b><br>
                            {{ isset($pdf_detail['patient_name']) ? $pdf_detail['patient_name'] : '' }}
                            <br />
                            <b>DOB:</b> {{ isset($pdf_detail['order_details'][0]['patient']['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($pdf_detail['order_details'][0]['patient']['dob']))) : ''  }} 
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
                        <div class="row">
                            <div class="col-sm-12 error_reports" style="margin-left:10%;">
                                @if($errors->any())
                                {!! implode('', $errors->all('<div style="color: red">:message</div>')) !!}
                                @endif
                            </div>
                        </div>
                        @if(!empty($pdf_detail['prescription']))                                               
                        @foreach($pdf_detail['prescription'] as $key => $val)
                        <div class="col-sm-12">
                            <div class="collapse multi-collapse" id="{{ 'Rx'.$val['rx_id'] }}">
                                <div class="collapse multi-collapse mainrx" id="{{ 'Rx'.$val['rx_id'] }}">
                                    <form method="post" action="{{ route('order.editrx') }}" class="add-new-form"/>
                                    {{csrf_field()}}
                                    <input type="hidden" class="stage"  name="stage" id="stage" value="2"/>
                                    <input type="hidden" class="rx_id" name="rx_id"  id="rx_id" value="{{ $val['rx_id'] }}"/>
                                    <input type="hidden" class="order_id" name="order_id" id="order_id" value="{{ $val['order_id'] }}">
                                    <input type="hidden" class="delete_rx_url"  name="delete_rx_url" id="delete_rx_url" value="{{ url('delete/rx') }}">
                                    <input type="hidden" name="provider_id" id="provider_id" value="{{ !empty($pdf_detail['order_details']) ? $pdf_detail['order_details'][0]['provider_id'] : '' }}">
                                    <input type="hidden" class="rx_fill_number"  name="rx_fill_number" id="rx_fill_number" value="{{ $val['rx_fill_number'] }}">
                                    <div class="card card-body rx-panel">
                                        <i class="fas fa-pencil-alt make_editable" align="right"></i>
                                        <div class="row">
                                            <div class="col"> <b>Rx#: </b>{{ $val['rx_id'] }}</div>
                                            <div class="col"> <b>Order#: </b>{{ $val['order_id'] }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col"> <b>Authorized Refill#: </b>{{ $val['refill_allowed'] ? $val['refill_allowed']['refill_allowed'] : '' }}</div>
                                            <div class="col"> <b>Remaining Refill#: </b>{{ $val['refill_allowed'] ? $val['refill_allowed']['remaining_refill'] : '' }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-4 col-sm-4 col-md-4 col-lg-4"> <b>Fill Number: </b>{{ $val['rx_fill_number'] }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"> <b>Formula/Product: </b>
                                                <select class="form-control inputDisabled formula" name="formula" required="required" disabled style="width:100%!important;">
                                                    <option selected="true" disabled="disabled" value="">Formula/Product</option>
                                                    @if(!empty($pdf_detail['selected_formulas']))
                                                    @foreach($pdf_detail['selected_formulas'] as $key => $value)
                                                        <option value=" {{$key}}"> {{$value}} </option>
                                                    @endforeach
                                                    @endif
                                                        <option disabled>____________________________________________________</option>
                                                    @if(!empty($pdf_detail['formula_data']))
                                                    @foreach($pdf_detail['formula_data'] as $key => $value)
                                                    @if($val['formula'] == $key)
                                                        <option value=" {{$key}}" selected="selected"> {{$value}} </option>
                                                    @else
                                                        <option value=" {{$key}}"> {{$value}} </option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"> <b>LOG ID/NDC: </b>
                                                <div class="form-group">
                                                    <select class="form-control inputDisabled log_id" name="log_id" id="log_id" disabled style="width:100%!important;"> 
                                                        @if(!empty($val['log_id']))
                                                        <option value=" {{$val['log_id']}}" selected="selected"> {{$val['log_id']}} </option>
                                                        @else
                                                        <option selected="true" disabled="disabled" value="">LOG ID/NDC</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                            <div class="row">
                                                <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6 new_log_id" style="display: none;">
                                                    <label for="LOG">LOG ID/NDC</label>
                                                    <input type="text" class="form-control inputDisabled" name="new_log_id" id="new_log_id" placeholder="LOG#/NDC" onkeyup="checkDec(this);" />
                                                </div>
                                            </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Quantity Prescribed:</b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="qty_p" id="qty_p{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['quantity_prescribed']) ? $val['quantity_prescribed'] : '' }}" onkeyup="checkDec(this);" />
                                                </div>
                                            </div>
                                            <div class="col  col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Quantity Dispensed: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="qty_d"  id="qty_d{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['quantity_dispensed']) ? $val['quantity_dispensed'] : '' }}" onkeyup="checkDec(this);" onfocusout="calculateTotalPrice({{$val['rx_id']}})" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"> <b>Supply: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="supply" id="supply{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['supply']) ? $val['supply'] : '' }}" onkeyup="checkDec(this);" onchange="calculateExpirtyDate({{$val['rx_id']}})"/> 
                                                </div>
                                            </div>
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"> <b>Unit: </b>
                                                <div class="form-group">
                                                    <select class="form-control inputDisabled" name="units" required="required" disabled style="width:100%;"> 
                                                        <option selected="true" disabled="disabled" value="">Unit</option>
                                                        @if(isset($pdf_detail['unit']))
                                                        @foreach($pdf_detail['unit'] as $key => $value)
                                                        @if($val['units'] == $value['id']) 
                                                        <option value="{{$value['id']}}" selected="selected"> {{$value['code']}} </option>
                                                        @else 
                                                        <option value="{{$value['id']}}">{{$value['code']." ".$value['description']}}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"> <b>Unit Price (<i class="fas fa-dollar-sign icon"></i>):</b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled input-field price" name="price" id="price{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['price']) ? $val['price'] : '' }}" onkeyup="checkDec(this);" onfocusout="calculateTotalPrice({{$val['rx_id']}})" />
                                                </div>
                                            </div>
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"> <b>Total Price(<i class="fas fa-dollar-sign icon"></i>): </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled input-field total_price" name="total_price" id="total_price{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['total_price']) ? $val['total_price'] : '' }}" onkeyup="checkDec(this);" readonly />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"><b>Schedule: </b>
                                                <select class="form-control schedule inputDisabled" name="schedule" id="schedule{{$val['rx_id']}}" disabled required="required" onchange="calculateRxExpiryDate(this.value, {{$val['rx_id']}});">
                                                    <option selected="true" disabled="disabled"  value="">Schedule</option>
                                                    @if(!empty($pdf_detail['schedule']))
                                                    @foreach($pdf_detail['schedule'] as $key => $value)
                                                    @if($val['schedule']['id'] == $value['id'])
                                                    <option value="{{$value['id']}}" selected="selected">{{$value['code']}}</option>
                                                    @else
                                                    <option value="{{$value['id']}}">{{$value['code']}}</option>
                                                    @endif
                                                    @endforeach
                                                    @endif
                                                </select>
                                            </div> 
                                            <div class="col col-xs-3 col-sm-3 col-md-3 col-lg-3"> <b>Daw: </b>
                                                <div class="form-group">
                                                    <select class="form-control inputDisabled" name="daw" required="required" disabled> 
                                                        <option disabled="disabled"  value="">DAW</option>
                                                        @if(isset($pdf_detail['daw']))
                                                        @foreach($pdf_detail['daw'] as $key => $value)
                                                        @if($val['daw']['code'] == $value['code']) 
                                                        <option value="{{$value['code']}}" selected="selected"> {{$value['code']."-".$value['description']}} </option>
                                                        @else 
                                                        <option value="{{$value['code']}}"> {{$value['code']."-".$value['description']}} </option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Fill Date: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled refill" name="refill_date" id="refill_date{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['refill_date']) ? date('n/j/Y',strtotime($val['refill_date'])) : '' }}" onchange="calculateExpirtyDate({{$val['rx_id']}})"/> 
                                                </div>
                                            </div>
                                       </div>
                                        <div class="row">
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>State: </b>
                                                <div class="form-group">
                                                    <select class="form-control inputDisabled" name="rx_state" required="required" disabled> 
                                                        <option selected="true" disabled="disabled"  value="">State</option>
                                                        @if(isset($pdf_detail['state']))
                                                        @foreach($pdf_detail['state'] as $key => $value)
                                                        @if($val['rx_state'] == $value['postal_code']) 
                                                        <option value="{{$value['postal_code']}}" selected="selected">{{$value['name']}}</option>
                                                        @else 
                                                        <option value="{{$value['postal_code']}}">{{$value['name']}}</option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"><b>Date Written: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled written" name="date_written" id="date_written{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['date_written']) ? date('n/j/Y',strtotime($val['date_written'])) : '' }}" onchange="calculateRxExpiryDate('',{{$val['rx_id']}});"/> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Rx Serial No: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="rx_serial" id="" disabled="disabled" value="{{ !empty($val['rx_serial']) ? $val['rx_serial'] : '' }}" maxlength="12" />
                                                </div>
                                            </div>
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Date Entered: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="date_entered" id="" disabled="disabled" value="{{ !empty($val['date_entered']) ? date('n/j/Y',strtotime($val['date_entered'])) : '' }}" /> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Origin: </b>
                                                <div class="form-group">
                                                    <select class="form-control inputDisabled" name="rx_origin" required="required" value="" disabled>
                                                        <option selected disabled="disabled">Rx Origin</option>
                                                        @if(isset($pdf_detail['rx_origin']))
                                                        @foreach($pdf_detail['rx_origin'] as $key => $value)
                                                        @if($val['rx_origin']['id'] == $value['id'])
                                                        <option value="{{$value['id']}}" selected="selected"> {{$value['rx_origin_desc']}} </option>
                                                        @else 
                                                        <option value="{{$value['id']}}"> {{$value['rx_origin_desc']}} </option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Used By Date: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="rx_exp_date" id="rx_exp_date{{$val['rx_id']}}" disabled="disabled" value="{{ !empty($val['rx_exp_date']) ? date('n/j/Y',strtotime($val['rx_exp_date'])) : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Manufacturer: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="manufacturer" id="" disabled="disabled" value="{{ !empty($val['manufacturer']) ? $val['manufacturer'] : '' }}" />
                                                </div>
                                            </div>
                                            <div class="col col-xs-6 col-sm-6 col-md-6 col-lg-6"> <b>Third Party: </b>
                                                <div class="form-group">
                                                    <input type="text" class="form-control inputDisabled" name="third_party" id="" disabled="disabled" value="{{ !empty($val['third_party']) ? $val['third_party'] : '' }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                <label for="RxExpDate">Rx Exp Date</label><span style="color:red">*</span>
                                                <input type="text" class="form-control" name="rx_expire_date" id="rx_expire_date{{$val['rx_id']}}" placeholder="Rx# Exipry Date" value="{{ !empty($val['used_by_date']) ? date('n/j/Y',strtotime($val['used_by_date'])) : '' }}" readonly="readonly"/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"> <b>SIG: </b>
                                                <div class="form-group">
                                                    <input type="hidden" class="form-control sigurl" name="sigurl" value="{{ URL('order/sig_code') }}">
                                                    <textarea class="form-control inputDisabled sig_desc" name="sig_desc" disabled="disabled" required="required">{{ !empty($val['sig']) ? $val['sig'] : '' }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <label for="RxNote"><b>Rx Note:</b></label>
                                                <textarea class="form-control rx_note inputDisabled" disabled="disabled" name="rx_note" id="rx_note">{{ !empty($val['rx_note']) ? $val['rx_note'] : '' }}</textarea>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="row">
                                            <div class="col-sm-12 float-right">
                                                <button class="btn btn-sm btn-danger delete-btn deleterx">Delete</button>
                                                <button class="btn purple-btn btn-sm editrx" onclick="this.form.submit()" style="display:none;">Update</button>
                                            </div>
                                        </div>
                                        <div class="scheduleStatus"></div>
                                    </div> 
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>  
                    <div class="row rx-row" style="display:none;" id="display_notes_message">
                        <div class="col-sm-12">  
                            <span style="color:red">Please add note before moving back stage, then try to move back stage.</span>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="accor-panel">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <div class="card-header" id="headingOne">
                                            <h5 class="mb-0">
                                                <div class="collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><i class="fa fa-caret-right"></i> 
                                                    Add New Rx
                                                </div>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <form method="post" action="{{ url('/order/addrx/') }}" id="add_rx_form" class="add-new-form">
                                                    @csrf
                                                    <input type="hidden" name="orderid" id="orderid" value="{{ $pdf_detail['order_details'][0]['order_id'] }}">
                                                    <input type="hidden" name="userid" id="userid" value="{{  Auth::user()->id ?  Auth::user()->id : '' }}">
                                                    <input type="hidden" name="patient_id" id="patient_id" value="{{ $pdf_detail['order_details'][0]['patient']['id'] ? $pdf_detail['order_details'][0]['patient']['id'] : '' }}">
                                                    <input type="hidden" name="url" id="url" value="{{ URL('/order/log_id/')}}">
                                                    <input type="hidden" name="schedule_url" id="schedule_url" value="{{ URL('/prescription/schedule/')}}">
                                                    <input type="hidden" name="provider_id" id="provider_id" value="{{ !empty($pdf_detail['order_details']) ? $pdf_detail['order_details'][0]['provider_id'] : '' }}">
                                                    @if(!empty($pdf_detail['order_details'][0]['provider']))
                                                    <input type="hidden" name="p_first_name" id="p_first_name" value="{{ $pdf_detail['order_details'][0]['provider']['first_name'] }}">
                                                    <input type="hidden" name="p_last_name" id="p_last_name" value="{{ $pdf_detail['order_details'][0]['provider']['last_name'] }}">
                                                    @endif
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="RX#">Rx#</label>
                                                            <input type="text" id="rx" name="rx" class="form-control" placeholder="{{ isset($pdf_detail['last_rx_id']) ? ++$pdf_detail['last_rx_id'] : '7130000' }}" readonly>
                                                        </div>
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="RX#">Rx Fill Number</label>
                                                            <input type="text" id="rx_fill_number" name="rx_fill_number" class="form-control" placeholder="0" value="0" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row"> 
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <label for="SelectFormula">Formula/Product</label><span style="color:red">*</span>
                                                            <select class="form-control formula" name="formula" id="formula" required="required" style="width:100%!important;">
                                                                <option selected="true" disabled="disabled" value="">Formula/Product</option>
                                                                @if(!empty($pdf_detail['selected_formulas']))
                                                                @foreach($pdf_detail['selected_formulas'] as $key => $value)
                                                                <option value=" {{$key}}"> {{$value}} </option>
                                                                @endforeach
                                                                @endif
                                                                <option disabled>____________________________________________________</option>
                                                                @if(!empty($pdf_detail['formula_data']))  
                                                                @foreach($pdf_detail['formula_data'] as $key => $value)
                                                                <option value=" {{$key}}"> {{$value}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                            <div id="loader" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row refills">
                                                            <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <label for="SelectRefillAllowed">No. of Refill Allowed</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control refill_allowed_count" name="refill_allowed_count" id="refill_allowed_count" placeholder="No. of Refilled Allowed" onkeyup="checkDec(this);" onfocusout="getRefillsAllowed(this.value)" required="required"/>
                                                            </div>
                                                            @if ($errors->has('refill_allowed_count'))
                                                                <span style="color:red">    {{ $errors->first('refill_allowed_count') }} </span>
                                                            @endif
                                                            <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                                <label for="SelectRefillRemaining">Refill Remaining</label><span style="color:red">*</span>
                                                                <input type="text" class="form-control refill_remaining" name="refill_remaining" id="refill_remaining" placeholder="Refill Remaining" readonly="readonly" required="required"/>
                                                            </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group  col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <label for="SelectLog">LOG ID/NDC</label><span style="color:red">*</span>
                                                            <select class="form-control log_id" name="log_id" id="log_id" style="width:100%!important;"> 
                                                                <option selected="true" disabled="disabled" value="">LOG#/NDC</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 new_log_id" style="display: none;">
                                                            <label for="LOG">LOG ID/NDC</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="new_log_id" id="new_log_id" placeholder="LOG#NDC" onkeyup="checkDec(this);" />
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="Quantity">Prescribed Quantity</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="qty_p" id="qty_p" placeholder="Prescribed Quantity" onkeyup="checkDec(this);" required="required" >
                                                        </div>
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="Quantity">Dispensed Quantity</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="qty_d" id="qty_d" placeholder="Dispensed Quantity" required="required"  onkeyup="checkDec(this);" onfocusout="calculateTotalPrice()"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="DaysSupply">Days Supply</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="supply" id="supply" placeholder="Days Supply" onkeyup="checkDec(this);calculateExpirtyDate();" required="required">
                                                        </div>
                                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="Unit">Unit</label><span style="color:red">*</span>
                                                            <select class="form-control" name="units" id="units"  required="required" > 
                                                                <option selected="true" disabled="disabled" value="">Unit</option>
                                                                @if(!empty($pdf_detail['unit']))
                                                                @foreach($pdf_detail['unit'] as $key => $value)
                                                                <option value="{{$value['id']}}"> {{$value['code']." ".$value['description']}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>                                 
                                                        </div>
                                                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="UnitPrice">Unit Price (<i class="fas fa-dollar-sign icon"></i>)</label>
                                                            <input type="text" class="form-control input-field" name="price" id="price" placeholder="Unit Price" onkeyup="checkDec(this);" onfocusout="calculateTotalPrice()"/>
                                                        </div>
                                                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="UnitPrice">Total Price (<i class="fas fa-dollar-sign icon"></i>)</label>
                                                            <input type="text" class="form-control input-field" name="total_price" id="total_price" placeholder="Total Price" onkeyup="checkDec(this);" readonly="readonly"/>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="SelectSchedule">Schedule</label><span style="color:red">*</span>
                                                            <select class="form-control schedule"  name="schedule" id="schedule" required="required" onchange="calculateRxExpiryDate(this.value);">
                                                                <option selected="true" disabled="disabled"  value="">Schedule</option>
                                                                @if(!empty($pdf_detail['schedule']))
                                                                @foreach($pdf_detail['schedule'] as $key => $value)
                                                                <option value="{{$value['id']}}"> {{$value['code']}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-xs-3 col-sm-3 col-md-3 col-lg-3">
                                                            <label for="DAW">DAW</label><span style="color:red">*</span>
                                                            <select class="form-control" name="daw" id="daw" required="required"> 
                                                                <option disabled="disabled"  value="">DAW</option>
                                                                @if(!empty($pdf_detail['daw']))
                                                                @foreach($pdf_detail['daw'] as $key => $value)
                                                                <option value="{{$value['code']}}"> {{$value['code']."-".$value['description']}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="FillDate">Fill Date</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="refill_date" id="refill_date" value="{{ date('n/j/Y') }}" placeholder="Fill Date" onchange="calculateExpirtyDate();"  required="required"> 
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div> 
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="State">State</label><span style="color:red">*</span>
                                                            <select class="form-control" name="rx_state" id="rx_state" required="required"> 
                                                                <option selected="true" disabled="disabled"  value="">State</option>
                                                                @if(!empty($pdf_detail['state']))
                                                                @foreach($pdf_detail['state'] as $key => $value)
                                                                <option value="{{$value['postal_code']}}"> {{$value['name']}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="DateWritten">Date Written</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="date_written" id="date_written" required="required" value="{{ date('n/j/Y') }}" onchange="calculateRxExpiryDate();" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="RxSerialNumber">Rx Serial Number</label><span id="rx_serial_red" style="color:red;display:none;">*</span>
                                                            <input type="text" class="form-control" minlength="12" maxlength="12" name="rx_serial" id="rx_serial" placeholder="Rx# Serial Number">
                                                        </div>
														<div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="DateEntered">Date Entered</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control"name="date_entered"  required="required" id="date_entered" value="{{ date('n/j/Y') }}">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="ThirdParty">Rx Origin</label><span style="color:red">*</span>
                                                            <select class="form-control" name="rx_origin" id="rx_origin" required="required" value="">
                                                                <option disabled="disabled">Rx Origin</option>
                                                                @if(!empty($pdf_detail['rx_origin']))
                                                                @foreach($pdf_detail['rx_origin'] as $key => $value)
                                                                <option value="{{$value['id']}}"> {{$value['rx_origin_desc']}} </option>
                                                                @endforeach
                                                                @endif
                                                            </select>
                                                        </div>
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="RxExpDate">Used By Date</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="rx_exp_date" id="rx_exp_date" placeholder="Used By Date"  required="required">
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="Manufacturer">Manufacturer</label>
                                                            <input type="text" class="form-control" name="manufacturer" id="manufacturer" placeholder="Manufacturer">
                                                        </div>
														<div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="ThirdParty">Third Party</label><span style="color:red">*</span>
                                                            <select class="form-control" name="third_party" id="third_party" required="required"> 
                                                                <option selected="true" disabled="disabled"  value="">Select Third Party</option>
                                                                <option selected="true" selected="selected" value="Cash">Cash</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group  col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                                            <label for="RxExpDate">Rx Exp Date</label><span style="color:red">*</span>
                                                            <input type="text" class="form-control" name="rx_expire_date" id="rx_expire_date" placeholder="Rx# Exipry Date" value="{{ date('n/j/Y') }}" required="required" readonly="readonly"/>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <label for="SigDesc">Sig Code</label><span style="color:red">*</span>
                                                            <input type="hidden" name="sigurl" class="form-control sigurl" id="sigurl" value="{{ URL('order/sig_code') }}">
                                                            <textarea class="form-control sig_desc" name="sig_desc" id="sig_desc" required="required"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="row">
                                                        <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                            <label for="RxNote">Rx Note</label>
                                                            <textarea class="form-control rx_note" name="rx_note" id="rx_note"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="mt-1 float-right" style="text-align:right;">
                                                        <button type="submit" class="btn purple-btn btn-sm" id="submit">Submit</button>
                                                        <span id="scheduleStatus"></span>
                                                    </div>
                                                </form> 
                                                <div class="clearfix"></div>
                                            </div>
                                        </div> <!-- ./Add New Rx Collapse -->
                                    </div> <!-- ./Add New Rx Card -->
                                    <div class="card">
                                        <div class="card-header" id="headingTwo">
                                            <h5 class="mb-0">
                                                <div class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo"><i class="fa fa-caret-right"></i> 
                                                    Dispatch Details
                                                </div>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">

                                            <form method="post" action="{{ url('dispatch/save') }}" class="add-new-form"/>
                                            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}"/>
                                            <input type="hidden" name="dispatch_order_id" id="dispatch_order_id" value="{{ $pdf_detail['order_id'] }}"/>
                                            <input type="hidden" name="dispatch_url" id="dispatch_url" value="{{ URL('dispatch') }}"/>
                                            <input type="hidden" name="dispatch_to_patient_id" id="dispatch_to_patient_id" value="{{ $pdf_detail['order_details'][0]['patient_id'] }}"/>
                                            <input type="hidden" name="dispatch_to_provider_id" id="dispatch_to_provider_id" value="{{ $pdf_detail['order_details'][0]['provider_id'] }}"/>
                                            <input type="hidden" name="redirect_to" id="redirect_to" value='entry'/>
                                            <div class="row">
                                                <div class="col-sm-12 dispatch-radio">  
                                                    <span>Dispatch to:</span>
                                                    <input type="radio"  name="dispatch_to" value="Provider" {{ ($pdf_detail['dispatch_details']['dispatch_to_type'] == 'Provider') ? "checked" : '' }}><label for="Provider">&nbsp;Provider</label>
                                                    <input type="radio"  name="dispatch_to" value="Patient" {{ ($pdf_detail['dispatch_details']['dispatch_to_type'] == 'Patient') ? "checked" : '' }}><label for="Patient">&nbsp;Patient</label><br>
                                                    @if ($errors->has('dispatch_to'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_to') }} </span>
                                                    @endif
                                                </div>
                                                <div class="col col-xs-4"></div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>First Name</label><span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="dispatch_first_name" id="dispatch_first_name" placeholder="First Name" value="{{ isset($pdf_detail['dispatch_details']['first_name'])? $pdf_detail['dispatch_details']['first_name']:''}}" required="required">
                                                    @if ($errors->has('dispatch_first_name'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_first_name') }} </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Last Name</label><span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="dispatch_last_name" id="dispatch_last_name" placeholder="Last Name" value="{{ isset($pdf_detail['dispatch_details']['last_name'])? $pdf_detail['dispatch_details']['last_name']:''}}" required="required">
                                                    @if ($errors->has('dispatch_last_name'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_last_name') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Address 1</label><span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="dispatch_address_1" id="dispatch_address_1" placeholder="Address1" value="{{ isset($pdf_detail['dispatch_details']['address1'])? $pdf_detail['dispatch_details']['address1']:''}}" required="required">  
                                                    @if ($errors->has('dispatch_address_1'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_address_1') }} </span>
                                                    @endif
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
                                                    @if ($errors->has('dispatch_city'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_city') }} </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>State</label><span style="color:red">*</span>
                                                    <select class="form-control" name="dispatch_state" id="dispatch_state" required="required"> 
                                                        <option value="">State</option>
                                                        @if(!empty($pdf_detail['state']))
                                                        @foreach($pdf_detail['state'] as $key => $value)
                                                        @if($pdf_detail['dispatch_details']['state']['postal_code'] == $value['postal_code'])
                                                        <option value="{{$value['postal_code']}}" selected> {{$value['name']}} </option>
                                                        @else
                                                        <option value="{{$value['postal_code']}}"> {{$value['name']}} </option>
                                                        @endif
                                                        @endforeach
                                                        @endif
                                                    </select>
                                                    @if ($errors->has('dispatch_state'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_state') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Zip</label><span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="dispatch_zip" id="dispatch_zip" maxlength="5" placeholder="Zip"  value="{{ isset($pdf_detail['dispatch_details']['zip']) ? $pdf_detail['dispatch_details']['zip'] : ''}}" required="required">
                                                    @if ($errors->has('dispatch_zip'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_zip') }} </span>
                                                    @endif
                                                </div>
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Phone</label><span style="color:red">*</span>
                                                    <input type="text" class="form-control" name="dispatch_phone" maxlength="10" id="dispatch_phone" placeholder="Phone" value="{{ isset($pdf_detail['dispatch_details']['phone']) ? $pdf_detail['dispatch_details']['phone'] : ''}}" required="required"/>
                                                    @if ($errors->has('dispatch_phone'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_phone') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Fax</label>
                                                    <input type="text" maxlength="10"class="form-control" name="dispatch_fax" id="dispatch_fax" placeholder="Fax" value="{{ isset($pdf_detail['dispatch_details']['fax']) ? $pdf_detail['dispatch_details']['fax'] : ''}}"/>
                                                </div>
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" name="dispatch_email" id="dispatch_email" placeholder="Email" value="{{ isset($pdf_detail['dispatch_details']['email']) ? $pdf_detail['dispatch_details']['email'] : ''}}"/>
                                                    @if ($errors->has('dispatch_email'))
                                                    <span style="color:red">    {{ $errors->first('dispatch_email') }} </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                    <label>Dispatch Method</label><span style="color:red">*</span>
                                                    <select class="form-control" name="dispatch_method" id="dispatch_method" required="required"> 
                                                        <option value="">Dispatch Method</option>
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
                                                <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                                </div>
                                            </div>
                                            <div class="clear-fix"></div>
                                            <br/>
                                            <div class="modal-footer">
                                                <input type="submit" class="bbtn purple-btn btn-sm" name="save" id="save" value="Save">
                                            </div>
                                            </form>
                                        </div> <!-- ./Dispatch --> 
                                    </div> <!-- ./Dispatch Card -->
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <br/>
                    <div class="row rx-row">
                        <div class="col-sm-12">
                            <form name="note" action="{{ URL('/addnote')}}" method="post">
                                @csrf
                                <input type="hidden" name="order_id" value="{{ !empty($pdf_detail['order_details'][0]['order_id']) ? $pdf_detail['order_details'][0]['order_id'] : '' }}">
                                <textarea name="notes" id="notes" class="form-control btn-sm" placeholder="Enter Note">{{ !empty($pdf_detail['order_details'][0]['note_details']) ? $pdf_detail['order_details'][0]['note_details']['note'] : '' }}</textarea><br/>
                                @if ($errors->has('notes'))
                                <span style="color:red">{{ $errors->first('notes') }} </span>
                                @endif
                                <input type="submit" name="save" id="save" class="btn purple-btn btn-sm foat-right" value="Save Notes">
                            </form>
                        </div>
                    </div>
                    <br/>
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
    $(".formula").select2();
    $(".log_id").select2();
    });
</script>                                
@stop
