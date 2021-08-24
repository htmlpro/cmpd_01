@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Order Entry'])
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
@include('orders.layout.counter_nav', ['stage' => '2'])
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
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size: 11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="date_received" width="90px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="provider" width="100px">Provider</th>
                    <th data-id="patient" width="100px">Patient</th>
                    <th data-id="dob" width="90px">DOB</th>
                    <th data-id="medication" width="140px">Medication</th>
                    <th data-id="client" width="100px">Client</th>
                    <th data-id="page_count" width="30px">Page Count</th>
                    <th data-id="source" width="65px">Source</th>
                    <th data-id="time" width="50px">Time(Hrs.)</th>
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
                </tr>
            </thead>
            <tbody>
                @foreach($order_details as $key => $value)
                <tr ondblclick="openStageWindow({{ '"entry"'.','.$value['order_id'].','.'""'}})">
                    <td>{{ isset($value['created_at']) ? date('n/j/Y',strtotime($value['created_at'])) : '' }}</td>
                    <td>{{ isset($value['order_id']) ? $value['order_id'] : ''}}</td>
                    <td>{{ empty($value['provider']) ? '' : ucwords(strtolower($provider_data[$value['provider']['id']])) }}</td>
                    <td>{{ empty($value['patient']) ? '' : ucwords(strtolower($patient_data[$value['patient']['id']])) }}</td>
                    <td>{{ empty($value['patient']) ? '' : (isset($value['patient']['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($value['patient']['dob']))) : '') }}</td>
                    <td>{{ !empty($value['prescription']) ? (!empty($formula_data) ? strtoupper($formula_data[$value['prescription'][0]['formula']]) : '') : '' }}</td>
                    <td>{{ empty($value['client_id']) ? '' : (empty($provider_data) ? '' : strtoupper($provider_data[$value['client_id']]))  }}</td>
                    <td>{{ isset($value['page_count']) ? $value['page_count'] : '' }}</td>
                    <td>{{ isset($value['source']) ? $value['source'] : ''}}</td>
                    <td>{{ isset($value['stage_time']) ? $value['stage_time'] : ''}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#!" class="d-inline-block more-btn" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">

                                <a class="dropdown-item" href="{{ url('/entry/changeorderstate/'.$value['order_id']) }}">Change Stage</a>
                                <a class="dropdown-item" href="{{ url('/order/manage/entry/'.$value['order_id']) }}">Manage</a>
                            </div>
                        </div>
                    </td>  
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <input type="hidden" name="getcolumorderurl" id="getcolumorderurl" value="{{ url('/order/getcolumorder') }}">
    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
    <input type="hidden" name="orderchangeurl" id="orderchangeurl" value="{{ url('/order/change') }}">
    <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
    <input type="hidden" name="stage" id="stage" value="{{trans('messages.order_entry')}}">
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
@stop