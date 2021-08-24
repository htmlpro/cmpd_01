@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name' =>'Order Preverification'])
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
@include('orders.layout.counter_nav', ['stage' => '3'])
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
        <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
        <div class="row mb-3">
            <div class="col-md-12">
                <input type="button" class="btn purple-btn btn-sm" value="Change Stage" class="form-control" onclick="changeStage();" />
                <input type="button" class="btn purple-btn btn-sm" value="Print Label" class="form-control" onclick="printLabel();" />
                <input type="button" class="btn purple-btn btn-sm" value="Print Work Sheet" class="form-control" onclick="printWorkSheet();" />

            </div>

        </div>
        <table id="pharmacy_tabel" class="display" style="width:100%; font-size: 11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="check_all" class="nofilter" width="20px"><input type="checkbox" name="checkallstage" id="checkall" /></th>
                    <th data-id="date_received" width="90px">Date Received</th>
                    <th data-id="order_num" width="75px">Order No.</th>
                    <th data-id="provider" width="100px">Provider</th>
                    <th data-id="date_entered" width="100px">Date Entered</th>
                    <th data-id="rx" width="100px">Rx</th>
                    <th data-id="patient" width="104px">Patient</th>
                    <th data-id="dob" width="104px">DOB</th>
                    <th data-id="medication" width="30px">Medication</th>
                    <th data-id="client" width="104px">Client</th>
                    <th data-id="time" width="50px">Time (in Hrs)</th>
                    <th data-id="action" class="nofilter">Action</th>
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
            </thead>   
            <tbody>
                @if(!empty($order_pres_details))
                @foreach($order_pres_details as $keys => $value)
                @foreach($value as $key => $val)
                <tr ondblclick="openStageWindow({{ '"preverification"'.','.$val['order_id'].','.$val['rx_id'] }})">
                <td><input type="checkbox" name="rx[]" class="checked"  value="{{ $val['rx_id'].'-'.$val['order_id'].'-'.$val['formula']}}" />
                    </td> 
                    <td>{{ !empty($val['order']) ? date('n/j/Y',strtotime($val['order']['created_at'])) : '' }}</td>
                    <td>{{ isset($val['order_id']) ? $val['order_id'] : '' }}</td>
                    <td>{{ !isset($val['order']['provider_id']) ? '' : (!empty($provider_data) ? ucwords(strtolower($provider_data[$val['order']['provider_id']])) : '') }}</td>
                    <td>{{ isset($val['date_entered']) ? date('n/j/Y',strTotime($val['date_entered'])) : '' }}</td>
                    <td>{{ isset($val['rx_id']) ? $val['rx_id'] : '' }}</td>
                    <td>{{ !isset($val['order']['patient_id']) ? '' : (!empty($patient_data) ? ucwords(strtolower($patient_data[$val['order']['patient_id']])) : '')  }}</td>
                    <td>{{ !isset($val['order']['patient']['dob']) ? '' : date('n/j/Y',strTotime(Crypt::decrypt($val['order']['patient']['dob']))) }}</td>
                    <td>{{ empty($val['formula']) ? '' : (!empty($formula_data) ? strtoupper($formula_data[$val['formula']]) : '') }}</td>
                    <td>{{ !isset($val['order']['client_id']) ? '' : (!empty($provider_data) ? strtoupper($provider_data[$val['order']['client_id']]) : '')  }}</td>
                    <td>{{ isset($val['stage_time']) ? $val['stage_time'] : ''}}</td>
                    <td>
                        <div class="dropdown">
                            <a href="#!" class="d-inline-block more-btn" id="dropdownMenuButton" data-toggle="dropdown"><i class="fas fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <input type="hidden" name="stage" id="stage" value="4"/> 
                                <input type="hidden" name="current_stage" id="current_stage" value="3"/> 
                                <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                                <input type="hidden" name="order_id" id="order_id" value="{{ $val['order_id'] }}"/>
                                <input type="hidden" name="total_dispatch" id="total_dispatch" value="{{ isset($order_pres_details) ? count($order_pres_details) : ''}}">
                                <a class="dropdown-item" href="{{ url('/preverification/changeorderstate/'.$val['rx_id'].'/'.$val['order_id'].'/4') }}">Change Stage</a>
                                <a class="dropdown-item" href="{{ url('/order/manage/preverification/'.$val['order_id'].'/'.$val['rx_id']) }}">Manage</a>
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
    <!-- Add Patient Modal -->  
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
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ URL('/order/create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="Attachment">Attachment</label>
                            <input type="file" class="form-control" name="file_path" id="file_path" placeholder="Enter file path" required="required"/>
                        </div>

                        <div class="form-group">
                            <label for="Provider">Provider</label>
                            <select class="form-control" name="provider" id="provider" required="required">
                                <option value=''>Please Select</option>
                                @if(isset($provider_data))
                                @foreach($provider_data as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Patient">Patient</label>
                            <select class="form-control" name="patient" id="patient" required="required">
                                <option value=''>Please Select</option>
                                @if(isset($patient_data))
                                @foreach($patient_data as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                @endif
                            </select>                        
                        </div>
                        <div class="form-group">
                            <label for="Medication">Medication</label>
                            <select class="form-control" name="medication" id="medication" required="required">
                                <option value=''>Please Select</option>
                                @if(isset($formula_data))
                                @foreach($formula_data as $key => $value)
                                <option value="{{$key}}">{{$value}}</option>
                                @endforeach
                                @endif
                            </select> 
                        </div>
                        <div class="form-group">
                            <label for="Client">Client</label>
                            <select class="form-control" name="client" id="client" required="required">
                                <option value=''>Please Select</option>
                                @if(isset($client_data))
                                @foreach($client_data as $key => $value)
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
                    <input type="hidden" name="stage" id="stage" value="Order Reception">
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
@stop