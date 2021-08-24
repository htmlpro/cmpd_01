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
            <div class="clearfix"></div>
        </div>
    <form class="add-new-form p-3" action="{{route('pharmacyinfo.update')}}" method="post">
        {{ csrf_field() }}
            <div class="col-md-12">
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Unique Information Source Code</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="unique_info_source_code" id="unique_info_source_code"
                    placeholder="Unique Information Source Code" value="{{$pharmacy_info->unique_info_source_code??''}}" required />
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Source Entity Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="source_entity_name" id="source_entity_name"
                            placeholder="Source Entity Name" value="{{$pharmacy_info->source_entity_name??''}}" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <label>Message</label><span style="color:red">*</span>
                        <textarea class="form-control" name="message" required>{{$pharmacy_info->message??''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>National Provider Identifier </label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="npi" id="npi"
                            placeholder="National Provider Identifier " value="{{$pharmacy_info->npi??''}}" required />
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>NCPDP/NABP Provider ID</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="ncpdp" id="ncpdp" placeholder="NCPDP/NABP Provider ID"
                            value="{{$pharmacy_info->ncpdp??''}}" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>DEA Number</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="dea" id="dea" placeholder="dea" value="{{$pharmacy_info->dea??''}}" required />
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Pharmacy Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="pharmacy_name" id="pharmacy_name"
                            placeholder="Pharmacy Name" value="{{$pharmacy_info->pharmacy_name??''}}" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Address Information – 1</label><span style="color:red">*</span>
                        <textarea class="form-control" name="pharmacy_address_1" required>{{$pharmacy_info->pharmacy_address_1??''}}</textarea>
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Address Information – 2</label>
                        <textarea class="form-control" name="pharmacy_address_2">{{$pharmacy_info->pharmacy_address_2??''}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>State</label><span style="color:red">*</span>
                        <select name="pharmacy_state" class="form-control" required>
                            <option value="">Select State</option>
                            @foreach ($state_list as $item) 
                            @php $selected = $pharmacy_info->pharmacy_state==$item->postal_code?'selected':'';@endphp
                                <option value="{{ $item->postal_code }}" {{$selected}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>City</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="pharmacy_city" id="pharmacy_city" placeholder="City"
                            value="{{$pharmacy_info->pharmacy_city??''}}" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Zip Code</label><span style="color:red">*</span>
                        <input type="number" class="form-control" name="pharmacy_zip_code" id="pharmacy_zip_code"
                            placeholder="Zip Code" value="{{$pharmacy_info->pharmacy_zip_code??''}}" required />
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Phone Number</label><span style="color:red">*</span>
                        <input type="number" class="form-control" name="pharmacy_phone" id="pharmacy_phone"
                            placeholder="Phone Number" value="{{$pharmacy_info->pharmacy_phone??''}}" required />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Contact Name</label><span style="color:red">*</span>
                        <input type="text" class="form-control" name="pharmacy_conatct_name" id="pharmacy_conatct_name"
                            placeholder="Contact Name" value="{{$pharmacy_info->pharmacy_conatct_name??''}}" required />
                    </div>
                    <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label>Chain Site ID</label>
                        <input type="number" class="form-control" name="pharmacy_chain_site_no" id="pharmacy_chain_site_no"
                            placeholder="Chain Site Number" value="{{$pharmacy_info->pharmacy_chain_site_no??''}}"  />
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-2">
                <div class="box">
                    <div class="row mb-2">
                        <div class="col-md-12">
                            <h4><u>Add State and License:</u></h4>
                        </div>
                    </div>
                    @if(!$license_list->isEmpty())
                    @foreach ($license_list as $key => $each_license)                        
                    <div class="row">
                        <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <select name="state[]" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach ($state_list as $item)
                                @php $selected = $each_license->postal_code==$item->postal_code?'selected':'';@endphp
                                    <option value="{{ $item->postal_code }}" {{$selected}}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="license_no[]" placeholder="State License Number"
                        value="{{$each_license->license_no??''}}" required />
                        </div>
                        @if($key==0)
                        <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <a href="javascript:void(0);" class="btn btn-success add-more btn-sm" title="Add More">+</a>
                        </div>
                        @else
                        <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <a href="javascript:void(0);" onclick="removeState(this)" class="btn btn-danger btn-sm remove" 
                            title="Remove">X</a>
                        </div>
                        @endif
                    </div>
                    @endforeach
                    @else
                    <div class="row">
                        <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <select name="state[]" class="form-control" required>
                                <option value="">Select State</option>
                                @foreach ($state_list as $item)
                                    <option value="{{ $item->postal_code }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <input type="text" class="form-control" name="license_no[]" placeholder="State License Number"
                                value="" required />
                        </div>
                        <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
                            <a href="javascript:void(0);" class="btn btn-success add-more btn-sm" title="Add More">+</a>
                        </div>
                    </div>
                    @endif
                    <div class="more-feilds"></div>

                </div>
            </div>
            <div class="col-md-12 mt-2 mb-3 text-center">
               <button type="submit" class="btn purple-btn btn-sm">Save</button>
            </div>
        </form>
    </div>
    <!-- Copy Fields -->
    <div class="copy d-none">
        <div class="row mt-2">
            <div class="form-group col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <select name="state[]" class="form-control" required>
                    <option value="">Select State</option>
                    @foreach ($state_list as $item)
                        <option value="{{ $item->postal_code }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <input type="text" class="form-control" name="license_no[]" placeholder="State License Number"
                    value="" required />
            </div>
            <div class="form-group col-xs-1 col-sm-1 col-md-1 col-lg-1">
                <a href="javascript:void(0);" onclick="removeState(this)" class="btn btn-danger btn-sm remove" 
                title="Remove">X</a>
            </div>
        </div>
    </div>

@endsection
