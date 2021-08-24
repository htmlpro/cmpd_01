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
            @if (Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="new-order-button">
                <button data-url="#" class="btn purple-btn btn-sm addpatient" data-toggle="modal"
                    data-title="Add New Patient" data-target="#addpatient"><i class="fas fa-plus mr-2"></i> New
                    Patient</button>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="grid-outer">
            <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
                <thead>
                    <tr id="table_tr">
                        <th data-id="first_name" width="80px">First Name</th>
                        <th data-id="last_name" width="75px">Last Name</th>
                        <th data-id="email" width="75px">Email</th>
                        <th data-id="dob" width="75px">DOB</th>
                        <th data-id="patient" width="60px">Gender</th>
                        <th data-id="gender" width="80px">Address1</th>
                        <th data-id="city" width="80px">City</th>
                        <th data-id="state" width="100px">Status</th>
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
                    @if (!empty($patients))
                        @foreach ($patients as $key => $value)
                            <tr>
                                <td>{{ $value['first_name'] ? Crypt::decrypt($value['first_name']) : '' }}</td>
                                <td>{{ $value['last_name'] ? Crypt::decrypt($value['last_name']) : '' }}</td>
                                <td>{{ $value['email'] ? Crypt::decrypt($value['email']) : '' }}</td>
                                <td>{{ $value['dob'] ? date('n/j/Y', strtotime(Crypt::decrypt($value['dob']))) : '' }}
                                </td>
                                <td>{{ $value['gender'] ? Crypt::decrypt($value['gender']) : '' }}</td>
                                <td>{{ $value['address1'] ? Crypt::decrypt($value['address1']) : '' }}</td>
                                <td>{{ $value['city'] ? Crypt::decrypt($value['city']) : '' }}</td>
                                <td>{{ isset($value['status']) ? $status[$value['status']] : '' }}</td>
                                <td>
                                    <a class="dropdown-item" href="{{ url('/patient/view/' . $value['id']) }}"><i
                                            class="fa fa-eye" aria-hidden="true"></i></a>
                                    <a class="dropdown-item" href="{{ url('/patient/edit/' . $value['id']) }}"><i
                                            class="fa fa-edit" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
        <!-- Add Patient Modal -->
        <div class="card">
            <div id="addpatient" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Patient</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ URL('/patient/create') }}" method="post" class="add-new-form">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>Indentification Type</label>
                                        <select class="form-control" name="identification" id="identification">
                                            <option value="" disabled="disabled">Indentification</option>
                                            @if (!empty($documents))
                                                @foreach ($documents as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ trim($value['name']) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label id="dln">Indentification Number</label>
                                        <input type="text" class="form-control" name="identification_number"
                                            id="identification_number" placeholder="Indentification Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>Additional Indentification Type</label>
                                        <select class="form-control" name="additional_identification_type"
                                            id="additional_identification_type">
                                            <option value="" >Additional Indentification</option>
                                            @if (!empty($documents))
                                                @foreach ($documents as $key => $value)
                                                    <option value="{{ $value['pmp_code'] }}">{{ trim($value['name']) }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label id="adln">Additional Indentification Number</label>
                                        <input type="text" class="form-control" name="additional_identification_number"
                                            id="additional_identification_number"
                                            placeholder="Additional Indentification Number">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>Name prefix</label>
                                        <input type="text" class="form-control" name="name_prefix" id="name_prefix"
                                            placeholder="Name Prefix" required="required" />
                                    </div>
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>Name Suffix</label>
                                        <input type="text" class="form-control" name="name_suffix" id="name_suffix"
                                            placeholder="Name Suffix" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>First Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="first_name" id="first_name"
                                            placeholder="First Name" required="required" />
                                    </div>
                                    <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" name="middle_name" id="middle_name"
                                            placeholder="Middle Name" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Last Name</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="last_name" id="last_name"
                                            placeholder="Last Name" required="required" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>DOB</label><span style="color:red">*</span>
                                        <input type="text" class="form-control" name="dob" id="dob" placeholder="DOB"
                                            required="required" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Gender</label><span style="color:red">*</span>
                                        <select class="form-control" name="gender" id="gender" required="required">
                                            <option value=''>Select Gender</option>
                                            <option value='Male'>Male</option>
                                            <option value='Female'>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Address 1</label>
                                        <input type="text" class="form-control" name="address1" id="address1"
                                            placeholder="Address 1" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Address 2</label>
                                        <input type="text" class="form-control" name="address2" id="address2"
                                            placeholder="Address 2" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>City</label>
                                        <input type="text" class="form-control" name="city" id="city" placeholder="City" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>State</label>
                                        <select class="form-control" name="state" id="state">
                                            <option value=''>Select Sate</option>
                                            @if (!empty($states))
                                                @foreach ($states as $key => $value)
                                                    <option value="{{ $value['postal_code'] }}">{{ $value['name'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Zip</label>
                                        <input type="text" class="form-control" name="zip" id="zip" maxlength="5"
                                            placeholder="Zip" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Phone</label>
                                        <input type="text" class="form-control" name="phone" id="phone" maxlength="10"
                                            placeholder="Phone" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            placeholder="Email" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Fax</label>
                                        <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Species</label>
                                        <select class="form-control" name="species" id="species">
                                            @if (!empty($species))
                                                @foreach ($species as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['species'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Third Party</label>
                                        <select class="form-control" name="third_party" id="third_party">
                                            <option value='cash'>Cash</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Allergies</label>
                                        <select class="form-control" name="allergies" id="allergies">
                                            <option value=''>Select Allergies</option>
                                            @if (!empty($allergies))
                                                @foreach ($allergies as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['description'] }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Health Conditions</label>
                                        <select class="form-control" name="health_conditions" id="health_conditions">
                                            <option value=''>Health Conditions</option>
                                            @if (!empty($health))
                                                @foreach ($health as $key => $value)
                                                    <option value="{{ $value['id'] }}">{{ $value['health'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Auto Refill</label>
                                        <select class="form-control" name="auto_refill" id="auto_refill">
                                            <option value='N' selected>No</option>
                                            <option value='Y'>Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Height</label>
                                        <input type="number" class="form-control" name="height" id="height"
                                            placeholder="Height" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>weight</label>
                                        <input type="number" class="form-control" name="weight" id="weight"
                                            placeholder="Weight" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Tech</label>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 2)
                                            <select name="tech" id="tech" class="form-control">
                                                <option value="">Select Tech</option>
                                                @if (!empty($tech_users))
                                                    @foreach ($tech_users as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @else
                                            <select name="tech" id="tech" class="form-control">
                                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                                                </option>
                                            </select>
                                        @endif
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Rph</label>
                                        @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                                            <select name="rph" id="rph" class="form-control">
                                                <option value="">Select Rph</option>
                                                @if (!empty($pharm_users))
                                                    @foreach ($pharm_users as $key => $value)
                                                        <option value="{{ $value['id'] }}">{{ $value['name'] }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        @else
                                            <select name="rph" id="rph" class="form-control">
                                                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}
                                                </option>
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label id="client_label">Status</label>
                                        <select class="form-control" name="status" id="status">
                                            @if (!empty($status))
                                                @foreach ($status as $key => $value)
                                                    <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Animal Name</label>
                                        <input type="text" class="form-control" name="animal_name" id="animal_name"
                                            maxlength="255" placeholder="Animal Name" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Country of Non-U.S. Resident</label>
                                        <input type="text" class="form-control" name="country_of_non_us"
                                            id="country_of_non_us" maxlength="255"
                                            placeholder="Country of Non-U.S. Resident" />
                                    </div>
                                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                        <label>Location Code</label>
                                        <select class="form-control" name="location_code" id="location_code">
                                            <option value="">Location Code</option>
                                            @if (!empty($location_code))
                                                @foreach ($location_code as $key => $value)
                                                    <option value="{{ $value['code'] }}">{{ $value['name'] }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm"
                                        data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn purple-btn btn-sm" value="Add Patient">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Patient Modal -->
        </div>
    @endsection
    @section('footer_scripts')
        <script src="{!!  asset('/public/js/datatabel.js') !!}"></script>
    @stop
