@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>'Provider'])
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
        <div class="new-order-button">
            <button  data-url="#" class="btn purple-btn btn-sm addprovider" data-toggle="modal" data-title="Add New Order" data-target="#addprovider"><i class="fas fa-plus mr-2"></i> New Provider</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="first_name" width="110px">First Name</th>
                    <th data-id="last_name" width="110px">Last Name</th>
                    <th data-id="email" width="95px">Email</th>
                    <th data-id="gender" width="80px">Address1</th>
                    <th data-id="city" width="80px">City</th>
                    <th data-id="patient" width="60px">Provider Type</th>
                    <th data-id="patient" width="60px">Client</th>
                    <th data-id="patient" width="60px">Status</th>
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
                </tr>
            </thead>
            <tbody>
                @if(!empty($providers))
                @foreach($providers as $key => $value) 
                <tr>
                    <td>{{ !empty($value['first_name']) ? $value['first_name'] : '' }}</td>
                    <td>{{ !empty($value['last_name']) ? $value['last_name'] : '' }}</td>
                    <td>{{ !empty($value['email']) ? $value['email'] : '' }}</td>
                    <td>{{ !empty($value['reg_address1']) ? $value['reg_address1'] : '' }}</td>
                    <td>{{ !empty($value['reg_city']) ? $value['reg_city'] : '' }}</td>
                    <td>{{ !empty($value['provider_status']) ? $type[$value['provider_status']] : '' }}</td>
                    <td>{{ !empty($value['client']) ? (!empty($provider_data) ? $provider_data[$value['client']] : '') : '' }}</td>
                    <td>{{ isset($value['status']) ? $status[$value['status']] : ''}}</td>
                    <td>
                        <a class="dropdown-item" href="{{ url('/provider/view/'.$value['id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="dropdown-item" href="{{ url('/provider/edit/'.$value['id']) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                    </td> 
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- Add New Provider -->
    <div id="addprovider" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Provider</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL('/provider/create') }}" method="post" class="add-new-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>First Name</label><span style="color:red">*</span>
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" required="required"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Address 1</label><span style="color:red">*</span>
                                <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1" required="required"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Address 2</label>
                                <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" id="city" placeholder="City"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>State</label>
                                <select class="form-control" name="state" id="state">
                                    <option value=''>Select State</option>
                                    @if(!empty($states))
                                    @foreach($states as $key => $value)
                                    <option value="{{$value['postal_code']}}">{{ $value['name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Zip</label>
                                <input type="text" class="form-control" name="zip" id="zip" maxlength="5" placeholder="Zip"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Phone</label>
                                <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone" maxlength="10"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Fax</label>
                                <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Provider NPI</label>
                                <input type="text" class="form-control" name="npi" id="npi" placeholder="Provider NPI"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Provider Supervisor</label>
                                <input type="text" class="form-control" name="supervisor" id="supervisor" placeholder="Provider Supervisor"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>State License</label>
                                <input type="text" class="form-control" name="license" id="license" placeholder="State License"/>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>DEA</label>
                                <input type="text" class="form-control" name="dea" id="dea" placeholder="DEA"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Provider Type</label>
                                <select class="form-control" name="provider_type" id="provider_type">
                                    @if(!empty($provider_types))
                                    @foreach($provider_types as $key => $value)
                                    <option value="{{$value['id']}}">{{ $value['type'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label id="corporate_label">Corporate</label>
                                <label id="logo_label" style="display: none;">Logo</label>
                                <select class="form-control" name="corporate" id="corporate">
                                    <option value=''>Corporate</option>
                                    @if(!empty($corporates))
                                    @foreach($corporates as $key => $value)
                                    <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                                <textarea name="zpl_code" id="zpl_code" class="form-control" style="display: none;" placeholder="ZPL code"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label id="client_label">Client</label>
                                <select class="form-control" name="client" id="client">
                                    <option value=''>Client</option>
                                    @if(!empty($clients))
                                    @foreach($clients as $key => $value)
                                    <option value="{{$value['id']}}">{{ $value['first_name']." ".$value['last_name'] }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label id="client_label">Status</label>
                                <select class="form-control" name="status" id="status">
                                    @if(!empty($status))
                                    @foreach($status as $key => $value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label id="client_label">Password</label>
                                <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                            </div>
			</div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn purple-btn btn-sm" value="Add Provider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_scripts')
<script src="{!! asset('/public/js/datatabel.js') !!}"></script> 
@stop
