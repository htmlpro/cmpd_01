@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Order Reception'])
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
@include('orders.layout.counter_nav', ['stage' => '1'])
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
        <div class="new-order-button">
            <button  data-url="#" class="btn purple-btn btn-sm addorder" data-toggle="modal" data-title="Add New Order" data-target="#addorder"><i class="fas fa-plus mr-2"></i> New Order</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="date_received" width="80px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="provider" width="110px">Provider</th>
                    <th data-id="patient" width="110px">Patient</th>
                    <th data-id="dob" width="80px">DOB</th>
                    <th data-id="medication">Medication</th>
                    <th data-id="client" width="100px">Client</th>
                    <th data-id="page_count" width="30px">Page Count</th>
                    <th data-id="source" width="70px">Source</th>
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
                @if(!empty($order_details))
                @foreach($order_details as $key => $value)
                <tr ondblclick="openStageWindow({{ '"reception"'.','.$value['order_id'].','.'""' }})">
                    <td>{{ date('n/j/Y',strtotime($value['created_at'])) }}</td>
                    <td>{{ !empty($value['order_id']) ? $value['order_id'] : '' }}</td>
                    <td>{{ empty($value['provider_id']) ? '' : (empty($provider_data) ? '' : ucwords(strtolower($provider_data[$value['provider_id']]))) }}</td>
                    <td>{{ empty($value['patient_id']) ? '' : (empty($patient_data) ? '' : ucwords(strtolower($patient_data[$value['patient_id']]))) }}</td>
                    <td>{{ empty($value['patient_id']) ? '' : (isset($value['patient']['dob']) ? date('n/j/Y',strTotime(Crypt::decrypt($value['patient']['dob']))) : '') }}</td>
                    <td>{{ !empty($value['prescription'][0]['formula']) ? $value['prescription'][0]['formula']['formula_name'] : '' }}</td>
                    <td>{{ empty($value['client_id']) ? '' : (empty($provider_data) ? '' : strtoupper($provider_data[$value['client_id']])) }}</td>
                    <td>{{ isset($value['page_count']) ? $value['page_count'] : '' }}</td>
                    <td>{{ isset($value['source']) ? $value['source'] : '' }}</td>
                    <td>{{ isset($value['stage_time']) ? $value['stage_time'] : ''}} </td>
                    <td>
                        <div class="dropdown">
                            <a href="#!" class="d-inline-block more-btn" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ url('/order/changeorderstate/'.$value['order_id']) }}">Change Stage</a>
                                <a class="dropdown-item" href="{{ url('/order/manage/reception/'.$value['order_id'])  }}">Manage</a>
                            </div>
                        </div>                
                    </td>  
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- Add New Order Modal -->
    <div id="addorder" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL('/order/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" class="form-control mr-2 choose" name="file_path" id="file_path" placeholder="Enter file path" accept="application/pdf" required="required"/>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="provider" id="provider" style="width:465px;">
                                <option value=''>Select Provider</option>
                                @if(!empty($provider_with_address))
                                @foreach($provider_with_address as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="patient" id="patient" style="width:465px;">
                                <option value=''>Select Patient</option>
                                @if(!empty($patient_data))
                                @foreach($patient_data as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                @endif
                            </select>                        
                        </div>  
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="getcolumorderurl" id="getcolumorderurl" value="{{ url('/order/getcolumorder') }}">
                    <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
                    <input type="hidden" name="orderchangeurl" id="orderchangeurl" value="{{ url('/order/change') }}">
                    <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
                    <input type="hidden" name="stage" id="stage" value="{{trans('messages.reception_stage')}}">
                    <input type="hidden" name="file_name" id="file_name" value="{{ isset($pdf_detail['file_name']) ? $pdf_detail['file_name'] : ''}}"/>
                    <input type="hidden" name="base_url" id="base_url" value="{{url('')}}"/>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value="Add Order">
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script>
<script>
                    $(document).ready(function () {
                    $("#patient").select2();
                    $("#provider").select2();
                    $("#client").select2();
                    });
</script>  
@stop
