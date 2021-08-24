@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Dispatch'])
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
@include('orders.layout.counter_nav', ['stage' => '7'])
<div class="tab-pane fade show active" id="orderFilling">
    <div class="p-3">
        <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
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
    <div class="grid-outer">
        <div class="row">
            <div class="col-sm-2">
                <input type="button" class="btn purple-btn btn-sm" value="Manage" class="form-control" onclick="getCheckedRx();" />
            </div>
        </div>
        <br/>
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="check_all" class="nofilter" width="20px"><input type="checkbox" name="checkall" id="checkall" /></th>
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
                    <th data-id="time" width="50px">Time (Hrs)</th>
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
            <tr>
            <td>
            @if(!empty($val['formula']))
            <input type="checkbox" name="rx[]" id="rx[]" value="{{ $val['rx_id'].'-'.$val['order']['order_id']}}" />
            @endif
            </td>
            <td>{{ isset($val['order']['created_at']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
            <td>{{ isset($val['order']['order_id']) ? $val['order']['order_id'] : '' }}</td>
            <td>{{ isset($val['order']['provider_id']) ? $val['order']['provider']['first_name'].' '.$val['order']['provider']['last_name'] : '' }}</td>
            <td>{{ isset($val['date_entered']) ? date('n/j/Y',strTotime($val['date_entered'])) : '' }}</td>
            <td>{{ isset($val['rx_id']) ? $val['rx_id'] : '' }}</td>
            <td>{{ isset($val['order']['patient_id']) ? Crypt::decrypt($val['order']['patient']['first_name']).' '.Crypt::decrypt($val['order']['patient']['last_name']) : '' }}</td>
            <td>{{ isset($val['order']['patient_id']) ? date('n/j/Y',strtotime(Crypt::decrypt($val['order']['patient']['dob']))) : '' }}</td>
            <td>{{ isset($val['formula']) ? ((!empty($formula_data)  && isset($formula_data[$val['formula']]))? strtoupper($formula_data[$val['formula']]) : '') : '' }}</td>
            <td>{{ isset($val['order']['client_id']) ? (!empty($provider_data) ? strtoupper($provider_data[$val['order']['client_id']]) : '') : '' }}</td>
            <td>{{ !empty($val['dispatch']) ? strtoupper($val['dispatch'][0]['dispatch_to_type']) :'' }}</td>
            <td>{{ !empty($val['dispatch']) ? $val['dispatch'][0]['dispatch_method']['dispatch_method']  : '' }}</td>
            <td>{{ isset($val['stage_time']) ? $val['stage_time'] : ''}}</td>
            <th><a href="{{ url('/prescription/info/7/'.$val['order']['order_id'].'/'.$val['rx_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
            </tr>
            @endforeach
            @endforeach
            @endif
            </tbody>
        </table>
    </div>
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.dispatch_stage')}}">
    <input type="hidden" name="rx_scan" id="rx_scan" autofocus="autofocus"/>
    <input type="hidden" name="getcolumorderurl" id="getcolumorderurl" value="{{ url('/order/getcolumorder') }}">
    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
    <input type="hidden" name="orderchangeurl" id="orderchangeurl" value="{{ url('/order/change') }}">
    <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.reception_stage')}}">
    <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
    <input type="hidden" name="total_dispatch" id="total_dispatch" value="{{ isset($order_pres_details) ? count($order_pres_details) : ''}}">
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
{{-- <script src="{!! asset('/public/js/scanner.js') !!}"></script> --}}
@stop