@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Patient'])
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
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"><span></span></div>
        <div clas=""><span ><a href="{{ URL('/patients') }}">Back</a></span></div>
    </div>
    <h4><b>View Patient</b></h4>
    <hr>
    @if(!empty($patient))
    <div class="modal-body">
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Indentification Type: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['identification'] ? $documents[$patient[0]['identification']] : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Indetification Number: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['identification_number'] ? Crypt::decrypt($patient[0]['identification_number']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Additional Indentification Type: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['additional_identification_type']!=null ? $additional_id_type[$patient[0]['additional_identification_type']] : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Additional Indetification Number: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['additional_identification_number']!=null ? Crypt::decrypt($patient[0]['additional_identification_number']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Name Prefix: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['name_prefix'] ? Crypt::decrypt($patient[0]['name_prefix']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Name Suffix: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['name_suffix'] ? Crypt::decrypt($patient[0]['name_suffix']) : ''}}
            </div>          
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>First Name: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['first_name'] ? Crypt::decrypt($patient[0]['first_name']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Middle Name: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['middle_name'] ? Crypt::decrypt($patient[0]['middle_name']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Last Name: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['last_name'] ? Crypt::decrypt($patient[0]['last_name']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>DOB: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['dob'] ? date('n/j/Y',strtotime(Crypt::decrypt($patient[0]['dob']))) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Address 1: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['address1'] ? Crypt::decrypt($patient[0]['address1']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Address 2: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['address2'] ? Crypt::decrypt($patient[0]['address2']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>City: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['city'] ? Crypt::decrypt($patient[0]['city']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>State: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{ $patient[0]['state'] ? (!empty($state_data) ? $state_data[$patient[0]['state']] : '') : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Zip: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['zip'] ? Crypt::decrypt($patient[0]['zip']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Phone: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['phone'] ? Crypt::decrypt($patient[0]['phone']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Email: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['email'] ? Crypt::decrypt($patient[0]['email']) : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Fax: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['fax'] ? Crypt::decrypt($patient[0]['fax']) : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Species: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['species'] ? (!empty($species_data) ? $species_data[$patient[0]['species']] : '') : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Third Party: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['third_party'] ? $patient[0]['third_party'] : ''}}
            </div>
        </div>
       
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Allergies: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{!empty($patient[0]['allergies']) ? (!empty($allergy_data) ? $allergy_data[$patient[0]['allergies']] : '') : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Health Condition: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['health_condition'] ? (!empty($health_data) ? $health_data[$patient[0]['health_condition']] : '') : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Height: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['height'] ? $patient[0]['height'] : ''}}

            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Weight: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['weight'] ? $patient[0]['weight'] : ''}}

            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Tech: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['tech'] ? (!empty($users) ? $users[$patient[0]['tech']] : '') : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Rph: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['rph'] ? (!empty($users) ? $users[$patient[0]['rph']] : '') : ''}}
            </div>
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Auto Refill: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                @if($patient[0]['auto_refills'] == 'Y')
                {{"Yes"}}
                @else 
                {{"No"}}
                @endif    
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Status: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                @if(isset($patient[0]['status']))
                {{$status[$patient[0]['status']]}}
                @endif
            </div>
            
        </div>
        <div class="row">
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Location Code: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['location_code'] ? (!empty($location_code) ? $location_code[$patient[0]['location_code']] : '') : ''}}
            </div>
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Animal Name: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['animal_name'] ? Crypt::decrypt($patient[0]['animal_name']) : ''}}
            </div>
          
        </div>
        <div class="row">
          
            <div class="form-group col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <b>Country Of Non US: </b>
            </div>
            <div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
                {{$patient[0]['country_of_non_us'] ? Crypt::decrypt($patient[0]['country_of_non_us']) : ''}}
            </div>
        </div>
    </div>
    @else
    {{"No Record Found!!"}}
    @endif
    <h4><b>Prescription History</b></h4>
    <hr>
    <div class="modal-body">
        <div class="row">
            <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
            <div class="row">
                <div class="col-sm-12" align="right">
                    <input type="button" class="btn purple-btn btn-sm" value="Refill" onclick="getCheckedRxToRefill();" />
                </div>
            </div>
            <table style="width:100%;font-size:12px;" border="1">
                <thead>
                    <tr id="table_tr">
                        <th data-id="check_all" class="nofilter" width="20px"><input type="checkbox" name="checkall" id="checkall" /></th>
                        <th>Stage</th>
                        <th>Date Received</th>
                        <th>Order#</th>
                        <th>Provider</th>
                        <th>Date Entered</th>
                        <th>Rx#</th>
                        <th>Fill#</th>
                        <th>Refill Remaining</th>
                        <th>Patient</th>
                        <th>DOB</th>
                        <th>Medication</th>
                        <th>Client</th>
                        <th>Ship To</th>
                        <th>Dispatch Method</th>
                        <th>Tracking Number</th>
                        <th>View</th>
                    </tr>
                    <tr id="table_tr">
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php($i = 0)
                    @if(!empty($rxs))
                    @foreach($rxs as $key => $value)
                    @foreach($value['prescription'] as $preskey => $presval)
                    <tr>
                        <th>
                            @if(!empty($stage) && !empty($refill_history[$presval['order_id'].$presval['rx_id']]))
                            @if(($stage[$presval['order_id'].$presval['rx_id']][0]->stage == 8 || $stage[$presval['order_id'].$presval['rx_id']][0]->stage == 10)
                            && $refill_history[$presval['order_id'].$presval['rx_id']][0]['remaining_qty'] > 0 && $presval['refill_status'] == 'N')
                            <input type="checkbox" name="rx[]" id="rx[]" value="{{ $presval['rx_id'] }}" />
                            <input type="hidden" name="order_id[]" id="order_id[]" value="{{ $presval['order_id'] }}" />
                            @php($i++)
                            @endif
                            @endif
                        </th>
                        <th>{{$stage ? (!empty($status_data) ? $status_data[$stage[$presval['order_id'].$presval['rx_id']][0]->stage] : '') : ''}}</th>
                        <th>{{$value['created_at'] ? date('n/j/Y',strtotime($value['created_at'])) : ''}}</th>
                        <th>{{$value['order_id'] ? $value['order_id'] : ''}}</th>
                        <th>{{$value['provider']['first_name'] ? $value['provider']['first_name']." ".$value['provider']['last_name'] : ''}}</th>
                        <th>{{$presval? $presval['created_at'] : ''}}</th>
                        <th>{{$presval ? $presval['rx_id'] : ''}}</th>
                        <th>{{$presval ? $presval['rx_fill_number'] : ''}}</th>
                        <th>{{!empty($refill_history[$presval['order_id'].$presval['rx_id']]) ? $refill_history[$presval['order_id'].$presval['rx_id']][0]['remaining_qty'] : '' }}</th>
                        <th>{{$value['patient']['first_name'] ? Crypt::decrypt($value['patient']['first_name'])." ".Crypt::decrypt($value['patient']['last_name']) : ''}}</th>
                        <th>{{$value['patient']['dob'] ? date('n/j/Y',strtotime(Crypt::decrypt($value['patient']['dob']))) : ''}}</th>
                        <th>{{$presval ? $presval['formula']['formula_short'] : ''}}</th>
                        <th>{{$value['client_id'] ?(!empty($provider_data) ? $provider_data[$value['client_id']] : '') : ''}}</th>
                        <th>{{$presval ? $presval['dispatch']['dispatch_to_type'] : ''}}</th>
                        <th>{{$presval['dispatch']['dispatch_method'] ? (!empty($method_data) ? $method_data[$presval['dispatch']['dispatch_method']] : '') : ''}}</th>
                        <th>{{$presval['dispatch']['invoice'] ? $presval['dispatch']['invoice']['tracking'] : ''}}</th>
                        <th><a href="{{ url('/patient/prescription/info/12/'.$presval['order_stage_realtion'][0]['stage'].'/'.$patient[0]['id'].'/'.$value['order_id'].'/'.$presval['rx_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                        </tr>
                    @endforeach
                    @endforeach
                    @endif
                </tbody>
                <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
                <input type="hidden" name="total_dispatch" id="total_dispatch"  value="{{$i}}" >
                <input type="hidden" name="base_url" id="base_url" value="{{ url('') }}">
                <input type="hidden" name="userid" id="userid" value="{{ Auth::user()->id ? Auth::user()->id : '' }}">
            </table>
        </div>
    </div>
    @if(empty($rxs))
    <div>No Record Found!!</div>
    @endif
</div>
@endsection
