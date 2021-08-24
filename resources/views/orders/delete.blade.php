@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Order Delete'])
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
@include('orders.layout.counter_nav', ['stage' => '5'])
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
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="date_received" width="80px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="order_num" width="75px">Rx</th>
                    <th data-id="provider" width="110px">Provider</th>
                    <th data-id="patient" width="110px">Patient</th>
                    <th data-id="dob" width="80px">DOB</th>
                    <th data-id="medication">Medication</th>
                    <th data-id="client" width="100px">Client</th>
                    <th data-id="page_count" width="30px">Page Count</th>
                    <th data-id="source" width="70px">Source</th>
                    <th data-id="action" style="display:none;" class="nofilter"></th>
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
                    <th style="display:none;"></th>
                </tr>
            </thead>
            <tbody> 
                @if(!empty($deleted_orders))
                @foreach($deleted_orders as $keys => $value)
                @foreach($value as $key => $val)
                <tr>
                    <td>{{ !empty($val['created_at']) ? date('n/j/Y',strtotime($val['created_at'])) : '' }}</td>
                    <td>{{ !empty($val['order_id']) ? $val['order_id'] : '' }}</td> 
                    <td>{{ !empty($val['order_stage_prescription']) ?  $val['order_stage_prescription'][0]['rx_id'] : '' }}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['provider_id']) ? '' : (empty($provider_data) ? '' : ucwords(strtolower($provider_data[$val['order_stage_orders'][0]['provider_id']]))) }}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['patient_id']) ? '' : (empty($patient_data) ? '' : ucwords(strtolower($patient_data[$val['order_stage_orders'][0]['patient_id']]))) }}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['patient']['dob']) ? '' : date('n/j/Y',strTotime(Crypt::decrypt($val['order_stage_orders'][0]['patient']['dob']))) }}</td>
                    <td>{{ !empty($val['order_stage_prescription']) ? ((!empty($formula_data) && isset($formula_data[$val['order_stage_prescription'][0]['formula']])) ? strtoupper($formula_data[$val['order_stage_prescription'][0]['formula']]) : '') : '' }}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['client_id']) ? '' : (empty($provider_data) ? '' : strtoupper($provider_data[$val['order_stage_orders'][0]['client_id']])) }}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['page_count']) ? '' : $val['order_stage_orders'][0]['page_count']}}</td>
                    <td>{{ empty($val['order_stage_orders'][0]['source']) ? '' : $val['order_stage_orders'][0]['source']}}</td>
                    <td style="display:none;"></td>  
                </tr>
                @endforeach
                @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
@stop
