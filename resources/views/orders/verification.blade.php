@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Verification'])
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
@include('orders.layout.counter_nav', ['stage' => '6'])
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
        <div class="row mb-3">
            <div class="col-sm-12">
                <input type="button" class="btn purple-btn btn-sm" value="Change Stage" class="form-control" onclick="changeStage();" />
                <input type="button" class="btn purple-btn btn-sm" value="Print Label" class="form-control" onclick="printLabel();" />
                <input type="button" class="btn purple-btn btn-sm" value="Print Work Sheet" class="form-control" onclick="printWorkSheet();" />
            </div>
        </div>
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="check_all" class="nofilter" width="20px"><input type="checkbox" name="checkallstage" id="checkall" /></th>
                    <th data-id="date_received" width="90px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="provider" width="100px">Provider</th>
                    <th data-id="date_entered" width="100px">Date Entered</th>
                    <th data-id="rx" width="75x">Rx</th>
                    <th data-id="patient" width="104px">Patient</th>
                    <th data-id="dob" width="90px">DOB</th>
                    <th data-id="medication" width="100px">Medication</th>
                    <th data-id="client" width="70px">Client</th>
                    <th data-id="time" width="50px">Time (Hrs)</th>
                    <th data-id="action" class="nofilter">Action</th>
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
                </tr>
            </thead>   
            <tbody>
                @if(!empty($order_pres_details))
                @foreach($order_pres_details as $keys => $value)
                @foreach($value as $pres => $val) 
                <tr ondblclick="openStageWindow({{ '"verification"'.','.$val['order_id'].','.$val['rx_id'] }})"> 
                    <td><input type="checkbox" name="rx[]" class="checked"  value="{{ $val['rx_id'].'-'.$val['order_id'].'-'.$val['formula']}}" />
                    </td>
                    <td>{{ isset($val['order']['created_at']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
                    <td>{{ isset($val['order_id']) ? $val['order_id'] : '' }}</td>
                    <td>{{ isset($val['order']['provider_id']) ? (!empty($provider_data) ? ucwords(strtolower($provider_data[$val['order']['provider_id']])) : '') : ''}}</td>
                    <td>{{ isset($val['date_entered']) ? date('n/j/Y',strTotime($val['date_entered'])) : '' }}</td>
                    <td>{{ isset($val['rx_id']) ? $val['rx_id'] : '' }}</td>
                    <td>{{ isset($val['order']['patient_id']) ? (!empty($patient_data) ? ucwords(strtolower($patient_data[$val['order']['patient_id']])) : '') : '' }}</td>
                    <td>{{ isset($val['order']['patient']['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($val['order']['patient']['dob']))) : '' }}</td>
                    <td>{{ empty($val['formula']) ? '' : (!empty($formula_data) ? strtoupper($formula_data[$val['formula']]) : '') }}</td>
                    <td>{{ ($val['order']['client_id'] == null) ? '' : (!empty($provider_data) ? strtoupper($provider_data[$val['order']['client_id']]) : '')  }}</td>
                    <td>{{ isset(($val['stage_time'])) ? $val['stage_time'] : ''}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#!" class="d-inline-block more-btn" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <input type="hidden" name="stage" id="stage" value="7"/> 
                                <input type="hidden" name="current_stage" id="current_stage" value="6"/> 
                                <input type="hidden" name="total_dispatch" id="total_dispatch" value="{{ isset($order_pres_details) ? count($order_pres_details) : ''}}">
                                <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                                <input type="hidden" name="order_id" id="order_id" value="{{ $val['order_id'] }}"/>
                                <a class="dropdown-item" href="{{ url('/verification/changeorderstate/'.$val['rx_id'].'/'.$val['order_id'].'/7') }}">Change Stage</a>
                                <a class="dropdown-item" href="{{ url('/order/manage/verification/'.$val['order_id'].'/'.$val['rx_id']) }}">Manage</a>
                            </div>
                        </div>
                    </td>  
                </tr>
                @endforeach
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <input type="hidden" name="getcolumorderurl" id="getcolumorderurl" value="{{ url('/order/getcolumorder') }}">
    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
    <input type="hidden" name="orderchangeurl" id="orderchangeurl" value="{{ url('/order/change') }}">
    <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.reception_stage')}}">
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
@stop