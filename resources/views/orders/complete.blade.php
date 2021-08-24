@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Complete'])
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
@include('orders.layout.counter_nav', ['stage' => '10'])
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
    <div class="grid-outer">
        <div class="row">
            <div class="col-sm-2">
                <form class="mb-3 select-state">
                    @csrf
                    <select class="form-control" name="change_state" id="complete_decline">
                        <option value="" selected="selected" disabled="disabled">Decline</option>
                        @if(!empty($status))
                        @foreach($status as $key => $value)
                        <option value="{{$value['id']}}">{{ $value['name'] }}</option>
                        @endforeach
                        @endif
                    </select>
                    <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}"/>
                </form>
            </div>
        </div>
        <br/>
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="status" width="20px">Status</th>
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
                    <th data-id="tracking_number" width="70px">Tracking Number</th>
                    <th data-id="time" width="50px">Time (Hrs)</th>
                    <th data-id="action" class="nofilter">View</th>
                </tr>
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
            <th></th>
            <th></th>
        </thead>
            <tbody>
                @if(!empty($order_stage_relation))
                @foreach($order_stage_relation as $key => $value)
                <tr>
                    <td>{{'COMPLETE'}}</td>
                    <td><input type="checkbox" name="rx[]" id="rx[]" value="{{ $value['rx_id'].'-'.$value['order_id'] }}" /></td>
                    <td>{{ isset($value['date_received']) ? date('n/j/Y',strtotime($value['date_received'])) : '' }}</td>
                    <td>{{ isset($value['order_id']) ? $value['order_id'] : '' }}</td>
                    <td>{{ isset($value['provider']) ? ucwords(strtolower($value['provider'])) : '' }}</td>
                    <td>{{ isset($value['date_entered']) ? date('n/j/Y',strTotime($value['date_entered'])) : '' }}</td>
                    <td>{{ isset($value['rx_id']) ? $value['rx_id'] : '' }}</td>
                    <td>{{ !empty($value['patient']) ? ucwords(strtolower(Crypt::decrypt($value['patient'])))." ".(!empty($value['patient_lastname']) ? ucwords(strtolower(Crypt::decrypt($value['patient_lastname']))) : '') : '' }}</td>
                    <td>{{ !empty($value['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($value['dob']))) : '' }}</td>
                    <td>{{ isset($value['medication']) ? strtoupper($value['medication']) : '' }}</td>
                    <td>{{ isset($value['client']) ? $value['client'] : '' }}</td>
                    <td>{{ isset($value['ship_to']) ? strtoupper($value['ship_to']) :'' }}</td>
                    <td>{{ isset($value['dispatch_method']) ? $value['dispatch_method'] : '' }}</td>
                    <td>{{ isset($value['tracking_num']) ? $value['tracking_num'] : '' }}</td>
                    <td>{{ round(($current_date - strtotime($value['stage_change_at']))/3600)}}</td>
                    <th><a href="{{ url('/prescription/info/10/'.$value['order_id'].'/'.$value['rx_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div> 
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.dispatch_stage')}}">
    <input type="hidden" name="rx_scan" id="rx_scan" autofocus="autofocus" class="txt"/>
    <input type="hidden" name="getcolumorderurl" id="getcolumorderurl" value="{{ url('/order/getcolumorder') }}">
    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
    <input type="hidden" name="orderchangeurl" id="orderchangeurl" value="{{ url('/order/change') }}">
    <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.reception_stage')}}">
    <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
    <input type="hidden" name="total_dispatch" id="total_dispatch" value="{{ !empty($order_stage_relation) ? count($order_stage_relation) : ''}}">
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
@stop