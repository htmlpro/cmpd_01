@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Invoice'])
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-1 mr-3">
        <span class="sidebar-hide-show tgl-btn"><i class="fa fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        {{ isset($invoice['stage_name']) ? $invoice['stage_name'] : '' }}
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
@section('content')
<div class="tab-pane fade show active order-outer" id="orderReception">
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"></div>
        <div clas=""><span ><a href="{{ URL('/invoice') }}">Back</a></span></div>
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
        <div class="col-sm-7"></div>
        <div class="col-sm-3">
            <form class="mb-3 select-state">  
                <select class="form-control" name="change_stage" id="dispatch_change_state">
                    <option value="">Decline</option>
                    @if(!empty($invoice['status']))
                    @foreach($invoice['status'] as $key => $value)
                    <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                    @endforeach
                    @endif
                </select>
                <input type="hidden" name="current_stage" id="current_stage" value="8">
                <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}"/>
            </form>
        </div>
        <div class="col-sm-2" align='left'>
            <button class="btn purple-btn btn-sm" id="next_stage">Next Stage</button>
        </div>
    </div>
    <div class="grid-outer">
        <button class="btn purple-btn flex-fill mr-2 btn-sm" onclick="exportTableToExcel('tblData', 'invoice-data')">Export(.xls)</button>
        <button id="printgrid" class="btn purple-btn flex-fill mr-2 btn-sm">Print</button>
        <div id="printTable">
            <div align='right'>
                <span><h5><b>Thousand Oaks Healthcare LLC,<br>Rite Away Pharmacy,<br>TX License# 26990/AS<br>San Antonio, TX 78232 2235</h5></span>
                            </div>
            <table class="table" id="tblData" style="width:100%;font-size:11px;">
                                <thead>
                                    <tr id="table_tr">
                                        <th data-id="status" width="20px">Status</th>
                                        <th data-id="date_received" width="90px">Date Received</th>
                                        <th data-id="order_num" width="9px">Order No.</th>
                                        <th data-id="provider" width="100px">Provider</th>
                                        <th data-id="date_entered" width="100px">Date Entered</th>
                                        <th data-id="rx" width="75x">Rx</th>
                                        <th data-id="patient" width="104px">Patient</th>
                                        <th data-id="dob" width="90px">DOB</th>
                                        <th data-id="medication" width="120px">Medication</th>
                                        <th data-id="client" width="70px">Client</th>
                                        <th data-id="dispatch_method" width="70px">Dispatch Method</th>
                                        <th data-id="tracking_no" width="105px">Tracking</th>
                                        <th data-id="tracking_no" width="100px">Price</th>
                                        <th data-id="tracking_no" width="70px">Delivery</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php ($dispatch_ids[] = '')
                                    @if(!empty($invoice['order_pres_details']))
                                    @foreach($invoice['order_pres_details'] as $keys => $value)
                                    @foreach($value as $key => $val)
                                    <tr>  
                                        <td>{{ !empty($val['dispatch']) ? strtoupper($val['dispatch'][0]['status']) : '' }}</td>
                                        <td>{{ isset($val['order']['created_at']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
                                        <td>{{ isset($val['order']['order_id']) ? $val['order']['order_id'] : '' }}</td>
                                        <td>{{ isset($val['order']['provider_id']) ? $val['order']['provider']['first_name'].' '.$val['order']['provider']['last_name'] : '' }}</td>
                                        <td>{{ isset($val['date_entered']) ? date('n/j/Y',strTotime($val['date_entered'])) : '' }}</td>
                                        <td>{{ isset($val['rx_id']) ? $val['rx_id'] : '' }}</td>
                                        <td>{{ isset($val['order']['patient_id']) ? Crypt::decrypt($val['order']['patient']['first_name']).' '.Crypt::decrypt($val['order']['patient']['last_name']) : '' }}</td>
                                        <td>{{ isset($val['order']['patient_id']) ? date('n/j/Y',strtotime(Crypt::decrypt($val['order']['patient']['dob']))) : '' }}</td>
                                        <td>{{ !empty($val['formula']) ? (!empty($invoice['formula_data']) ? strtoupper($invoice['formula_data'][$val['formula']]) : '') : '' }}</td>
                                        <td>{{ isset($val['order']['client_id']) ? (!empty($invoice['client_data']) ? strtoupper($invoice['client_data'][$val['order']['client_id']]) : '') : '' }}</td>        
                                        <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['dispatch_method']['dispatch_method'] : '' }}</td>
                                        <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['invoice']['tracking'] : ''}}</td>
                                        <td>{{ !empty($val['invoice_price']) ? $val['invoice_price'][0]['price'] : ''}}</td>
                                        @if(in_array($val['dispatch'] ? $val['dispatch'][0]['dispatch_id'] : 0, $dispatch_ids))
                                        <td>{{ '0' }} </td>
                                        @else
                                        <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['invoice']['delivery_price'] : ''}}</td>
                                        @endif
                                        @php ($dispatch_ids[] = $val['dispatch'] ? $val['dispatch'][0]['dispatch_id']: 0)
                                        <input type="checkbox" name="rx[]" id="rx[]" value="{{ $val['rx_id'].'-'.$val['order_id'] }}" checked="checked" style="display: none;"/>
                                    </tr>
                                    @endforeach
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
                            <hr>
                            <table style="width: 100%">
                                <colgroup>
                                    <col span="1" style="width: 76%">
                                    <col span="1" style="width: 10%;">
                                    <col span="1" style="width: 7%;">
                                    <col span="1" style="width: 7%;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td>Total</td>
                                        <td>{{$invoice['total_price'] ? $invoice['total_price'] : ''}}</td>
                                        <td>{{$invoice['total_delivery_price'] ? $invoice['total_delivery_price'] : ''}}</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Delivery</td>
                                        <td>{{$invoice['total_delivery_price'] ? $invoice['total_delivery_price'] : ''}}</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Grand Total</td>
                                        <td>{{$invoice['grand_total'] ? $invoice['grand_total']: ''}}</td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>

                            </div>
                            </div>
                            </div>
                            @endsection
