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
        <div class="d-flex mb-3 back-btn">
            <div clas="flex-grow-1 total" style="width:100%"><span></span></div>
            <div clas=""><span><a href="{{ URL('/patients') }}">Back</a></span></div>
        </div>
        <div class="p-3">
            @if (Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="clearfix"></div>
        </div>
        @if (!empty($patient))
            <div class="modal-body">
                <form action="{{ URL('/patient/update') }}" method="post" class="add-new-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Indentification Type</label><span style="color:red">*</span>
                            <select class="form-control" name="identification" id="identification">
                                <option value="" disabled="disabled">Indentification</option>
                                @if (!empty($documents))
                                    @foreach ($documents as $key => $value)
                                        @php
                                            $doc_selected = $value['id'] == $patient[0]['identification'] ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $value['id'] }}" {{ $doc_selected }}>{{ trim($value['name']) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Indetification Number</label>
                            <input type="text" class="form-control" name="identification_number" id="identification_number"
                                placeholder="Indentification Number"
                                value="{{ $patient[0]['identification_number'] ? Crypt::decrypt($patient[0]['identification_number']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                            <label>Additional Indentification Type</label>
                            <select class="form-control" name="additional_identification_type"
                                id="additional_identification_type">
                                <option value="" disabled="disabled">Additional Indentification</option>
                                @if (!empty($documents))
                                    @foreach ($documents as $key => $value)
                                        @php
                                            $iden_selected = $value['pmp_code'] == $patient[0]['additional_identification_type'] ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $value['pmp_code'] }}" {{ $iden_selected }}>{{ trim($value['name']) }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                            <label id="adln">Additional Indentification Number</label>
                            <input type="text" class="form-control" name="additional_identification_number"
                                id="additional_identification_number"
                                value="{{ $patient[0]['additional_identification_number'] ? Crypt::decrypt($patient[0]['additional_identification_number']) : '' }}"
                                placeholder="Additional Indentification Number">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                            <label>Name prefix</label>
                            <input type="text" class="form-control"
                                value="{{ $patient[0]['name_prefix'] ? Crypt::decrypt($patient[0]['name_prefix']) : '' }}"
                                name="name_prefix" id="name_prefix" placeholder="Name Prefix" />
                        </div>
                        <div class="form-group col-xs-5 col-sm-6 col-md-6 col-lg-6">
                            <label>Name Suffix</label>
                            <input type="text" class="form-control"
                                value="{{ $patient[0]['name_suffix'] ? Crypt::decrypt($patient[0]['name_suffix']) : '' }}"
                                name="name_suffix" id="name_suffix" placeholder="Name Suffix" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>First Name</label><span style="color:red">*</span>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                placeholder="First Name"
                                value="{{ $patient[0]['first_name'] ? Crypt::decrypt($patient[0]['first_name']) : '' }}"
                                required="required" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" id="middle_name"
                                placeholder="Middle Name"
                                value="{{ $patient[0]['middle_name'] ? Crypt::decrypt($patient[0]['middle_name']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name"
                                value="{{ $patient[0]['last_name'] ? Crypt::decrypt($patient[0]['last_name']) : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>DOB</label><span style="color:red">*</span>
                            <input type="text" class="form-control" name="dob" id="dob" placeholder="DOB"
                                value="{{ $patient[0]['dob'] ? Crypt::decrypt($patient[0]['dob']) : '' }}"
                                required="required" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Gender</label><span style="color:red">*</span>
                            <select class="form-control" name="gender" id="gender" required="required">
                                <option value=''>Select Gender</option>
                                @if (Crypt::decrypt($patient[0]['gender']) == 'Male')
                                    <option value='Male' selected="selected">Male</option>
                                    <option value='Female'>Female</option>
                                @elseif(Crypt::decrypt($patient[0]['gender']) == 'Female')
                                    <option value='Male'>Male</option>
                                    <option value='Female' selected="selected">Female</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Address 1</label>
                            <input type="text" class="form-control" name="address1" id="address1" placeholder="Address 1"
                                value="{{ $patient[0]['address1'] ? Crypt::decrypt($patient[0]['address1']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Address 2</label>
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Address 2"
                                value="{{ $patient[0]['address2'] ? Crypt::decrypt($patient[0]['address2']) : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City"
                                value="{{ $patient[0]['city'] ? Crypt::decrypt($patient[0]['city']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>State</label>
                            <select class="form-control" name="state" id="state">
                                <option value=''>Select State</option>
                                @if (!empty($states))
                                    @foreach ($states as $key => $value)
                                        @if ($value['postal_code'] == $patient[0]['state'])
                                            )
                                            <option value="{{ $value['postal_code'] }}" selected="selected">
                                                {{ $value['name'] }}</option>
                                        @else
                                            <option value="{{ $value['postal_code'] }}">{{ $value['name'] }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Zip</label>
                            <input type="text" class="form-control" name="zip" id="zip" maxlength="5" placeholder="Zip"
                                value="{{ $patient[0]['zip'] ? Crypt::decrypt($patient[0]['zip']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Phone</label>
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Phone"
                                maxlength="10"
                                value="{{ $patient[0]['phone'] ? Crypt::decrypt($patient[0]['phone']) : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                value="{{ $patient[0]['email'] ? Crypt::decrypt($patient[0]['email']) : '' }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Fax</label>
                            <input type="text" class="form-control" name="fax" id="fax" placeholder="Fax"
                                value="{{ $patient[0]['fax'] ? Crypt::decrypt($patient[0]['fax']) : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Species</label>
                            <select class="form-control" name="species" id="species">
                                @if (!empty($species))
                                    @foreach ($species as $key => $value)
                                        @if ($value['id'] == $patient[0]['species'])
                                            <option value="{{ $value['id'] }}" selected="selected">
                                                {{ $value['species'] }}</option>
                                        @else
                                            <option value="{{ $value['id'] }}">{{ $value['species'] }}</option>
                                        @endif
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
                                        @if ($value['id'] == $patient[0]['allergies'])
                                            <option value="{{ $value['id'] }}" selected="selected">
                                                {{ $value['description'] }}</option>
                                        @else
                                            <option value="{{ $value['id'] }}">{{ $value['description'] }}</option>
                                        @endif
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
                                        @if ($value['id'] == $patient[0]['health_condition'])
                                            <option value="{{ $value['id'] }}" selected="selected">
                                                {{ $value['health'] }}</option>
                                        @else
                                            <option value="{{ $value['id'] }}">{{ $value['health'] }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Auto Refill</label>
                            <select class="form-control" name="auto_refill" id="auto_refill">
                                @if ($patient[0]['auto_refills'] == 'N' || $patient[0]['auto_refills'] == '')
                                    <option value='N' selected="selected">No</option>
                                    <option value='Y'>Yes</option>
                                @elseif($patient[0]['auto_refills'] == 'Y')
                                    <option value='Y' selected="selected">Yes</option>
                                    <option value='N'>No</option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Height</label>
                            <input type="number" class="form-control" name="height" id="height" placeholder="Height"
                                value="{{ $patient[0]['height'] ? $patient[0]['height'] : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>weight</label>
                            <input type="number" class="form-control" name="weight" id="weight" placeholder="Weight"
                                value="{{ $patient[0]['weight'] ? $patient[0]['weight'] : '' }}" />
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
                                            @if ($patient[0]['tech'] == $value['id'])
                                                <option value="{{ $value['id'] }}" selected="selected">
                                                    {{ $value['name'] }}</option>
                                            @else
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            @else
                                <select name="tech" id="tech" class="form-control">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
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
                                            @if ($patient[0]['rph'] == $value['id'])
                                                <option value="{{ $value['id'] }}" selected="selected">
                                                    {{ $value['name'] }}</option>
                                            @else
                                                <option value="{{ $value['id'] }}">{{ $value['name'] }}</option>
                                            @endif
                                        @endforeach
                                    @endif
                                </select>
                            @else
                                <select name="rph" id="rph" class="form-control">
                                    <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
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
                                        @if ($patient[0]['status'] == $key)
                                            <option value="{{ $key }}" selected="selected">{{ $value }}
                                            </option>
                                        @else
                                            <option value="{{ $key }}">{{ $value }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Animal Name</label>
                            <input type="text" class="form-control" name="animal_name" id="animal_name" maxlength="255"
                                value="{{ $patient[0]['animal_name'] ? Crypt::decrypt($patient[0]['animal_name']) : '' }}"
                                placeholder="Animal Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Country of Non-U.S. Resident</label>
                            <input type="text" class="form-control" name="country_of_non_us" id="country_of_non_us"
                                maxlength="255" placeholder="Country of Non-U.S. Resident"
                                value="{{ $patient[0]['country_of_non_us'] ? Crypt::decrypt($patient[0]['country_of_non_us']) : '' }}" />
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <label>Location Code</label>
                            <select class="form-control" name="location_code" id="location_code">
                                <option value="">Location Code</option>
                                @if (!empty($location_code))
                                    @foreach ($location_code as $key => $value)
                                        @php
                                            $selected = $value['code'] == $patient[0]['location_code'] ? 'selected' : '';
                                        @endphp
                                        <option value="{{ $value['code'] }}" {{ $selected }}>{{ $value['name'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="patient_id" id="patient_id" value="{{ $patient[0]['id'] }}">
                        <input type="submit" class="btn purple-btn btn-sm" value="Save">
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
