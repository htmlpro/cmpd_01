<?php //echo '<pre>'; print_r($status); die;         ?>
@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Problem On Hold'])
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
@include('orders.layout.counter_nav', ['stage' => '9'])
<div class="tab-pane fade show active" id="orderReception">
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
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%; font-size: 11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="stage" width="90px">Stage</th>
                    <th data-id="date_received" width="90px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="provider" width="100px">Provider</th>
                    <th data-id="date_entered" width="100px">Date Entered</th>
                    <th data-id="rx" width="100px">Rx</th>
                    <th data-id="patient" width="104px">Patient</th>
                    <th data-id="dob" width="104px">DOB</th>
                    <th data-id="medication" width="30px">Medication</th>
                    <th data-id="client" width="104px">Client</th>
                    <th data-id="ship_to" width="104px">Ship To</th>
                    <th data-id="dispatch_method" width="104px">Dispatch Method</th>
                    <th data-id="time" width="50px">Time (in Hrs)</th>
                    <th data-id="action" class="nofilter">View</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th> 
                </tr>
            </thead>  
            <tbody>
                @if(!empty($order_pres_details))
                @foreach($order_pres_details as $keys => $value)
                @foreach($value as $key => $val)
                <tr ondblclick="">
                    <td>{{ "Problem On Hold" }}</td> 
                    <td>{{ isset($val['order']['created_at']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
                    <td>{{ isset($val['order_id']) ? $val['order_id'] : ''  }}</td>
                    <td>{{ isset($val['order']['provider']) ? ucwords(strtolower($val['order']['provider']['first_name']. ' ' .$val['order']['provider']['last_name'])) : ''}}</td>
                    <td>{{ isset($val['order_history_prescription']['date_entered']) ? date('n/j/Y',strTotime($val['order_history_prescription']['date_entered'])) : '' }}</td>
                    <td>{{ isset($val['order_history_prescription']['rx_id']) ? $val['order_history_prescription']['rx_id'] : '' }}</td>
                    <td>{{ isset($val['order']['patient']) ? ucwords(strtolower(Crypt::decrypt($val['order']['patient']['first_name']). ' ' .Crypt::decrypt($val['order']['patient']['last_name']))) : '' }}</td>
                    <td>{{ isset($val['order']['patient']) ? date('n/j/Y',strTotime(Crypt::decrypt($val['order']['patient']['dob']))) : '' }}</td>
                    <td>{{ isset($val['order_history_prescription']['formula']) ? ((!empty($formula_data) && isset($formula_data[$val['order_history_prescription']['formula']])) ? strtoupper($formula_data[$val['order_history_prescription']['formula']]) : '') : ''}}</td>
                    <td>{{ isset($val['order']['client_id']) ? (!empty($provider_data) ? strtoupper($provider_data[$val['order']['client_id']]) : '') : ''}}</td>
                    <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['dispatch_to_type'] : ''}}</td>
                    <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['dispatch_method']['dispatch_method'] : ''}}</td>
                    <td>{{ isset($val['stage_time']) ? $val['stage_time'] : ''}}</td>
                    <th><a href="{{ url('/prescription/info/9/'.$val['order_id'].'/'.$val['rx_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                </tr>
                @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    @endsection
    @section('footer_scripts')
    <script src="{!! asset('/public/js/datatabel.js') !!}"></script>
    @stop
