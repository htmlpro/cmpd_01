@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'All Queue'])
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
@include('orders.layout.counter_nav', ['stage' => 'all'])
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
                    <th data-id="dispatch_method" width="104px">Tracking Number</th>
                    <th data-id="time" width="50px">Time (in Hrs)</th>
                    <th data-id="action" class="nofilter">@if(Auth::user()->role <= 3) View @endif</th> 
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
            </thead>   
            <tbody>
                @if(isset($all_queue))
                @foreach($all_queue as $key => $value)
                <tr ondblclick="">
                    <td>{{ isset($value['stage']) ? $value['stage'] : '' }}</td>
                    <td>{{ isset($value['date_received']) ? date('n/j/Y',strtotime($value['date_received'])) : '' }}</td>
                    <td>{{ isset($value['order_id']) ? $value['order_id'] : '' }}</td>
                    <td>{{ isset($value['provider']) ? ucwords(strtolower($value['provider'])) : '' }}</td>
                    <td>{{ isset($value['date_entered']) ? date('n/j/Y',strTotime($value['date_entered'])) : '' }}</td>
                    <td>{{ isset($value['rx_id']) ? $value['rx_id'] : '' }}</td>
                    <td>{{ !empty($value['patient']) ? ucwords(strtolower(Crypt::decrypt($value['patient'])))." ".(!empty($value['patient_lastname']) ? ucwords(strtolower(Crypt::decrypt($value['patient_lastname']))) : '') : '' }}</td>
                    <td>{{ !empty($value['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($value['dob']))) : '' }}</td>
                    <td>{{ isset($value['medication']) ? strtoupper($value['medication']) : '' }}</td>
                    <td>{{ isset($value['client']) ? $value['client'] : '' }}</td>
                    <td>{{ isset($value['ship_to']) ? $value['ship_to'] : '' }}</td>
                    <td>{{ isset($value['dispatch_method']) ? $value['dispatch_method'] : '' }}</td>
                    <td>{{ isset($value['tracking_num']) ? $value['tracking_num'] : '' }}</td>
                    <td>{{ round(($current_date - strtotime($value['stage_change_at']))/3600)}}</td>
                    <th>@if(Auth::user()->role <= 3)<a href="{{ url('/all/prescription/info/11/'.$value['stage_id'].'/'.$value['order_id'].'/'.$value['rx_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>@endif</th>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- Rx History Modal -->
    <div id="rxHistoryModal" class="modal fade">  
        <div class="modal-dialog modal-lg">  
            <div class="modal-content">  
                <div class="modal-header">
                    <h4 class="modal-title">Rx# History Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body" id="rx_history_detail">  
                </div>  
                <div align="right">  
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
            </div>  
        </div>  
    </div>  
    @endsection
    @section('footer_scripts')
    <script src="{!! asset('/public/js/datatabel.js') !!}"></script>
    @stop
