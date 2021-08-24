@extends('layouts.app')
@extends('orders.layout.sidebar',['stage_name'=>$stage_name])
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
        <div class="grid-outer">
            <div style="float: right;font-weight: bold;">
                <input type="hidden" id="url" value="{{ route('matrix.save') }}">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal2">View Fields Logic</a>
            </div>
            <div class="table-responsive">
                <table id="pharmacy_tabel" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Version</th>
                            @if (!$state_list->isEmpty())
                                @foreach ($state_list as $item)
                                    <th>
                                        <select name="version" onchange="changeVersion(this,{{ $item->postal_code }})"
                                            id="">                                       
                                                <option value="4.2">4.2</option>
                                                <option value="4.1">4.1</option>
                                        </select>
                                    </th>
                                @endforeach
                            @endif
                        </tr>
                        <tr>
                            <th>Fields</th>
                            @if (!$state_list->isEmpty())
                                @foreach ($state_list as $item)
                                    <th>{{ $item->postal_code }}</th>
                                @endforeach
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($field_list))
                            @foreach ($field_list as $value)
                                <tr>
                                    <td>{{ $value['field_code'] }}</td>
                                    @if (!empty($value['state']))
                                        @foreach ($value['state'] as $eachitem)
                                            <td class="{{ $eachitem['class'] }}">
                                                <select id="fieldtype_{{ $eachitem['postal_code'] }}_{{ $value['field_code'] }}"
                                                    class = "fieldtype"
                                                    data-field="{{ $value['field_code'] }}"
                                                    data-state="{{ $eachitem['postal_code'] }}" onchange="savematrix(this)">
                                                    @foreach ($field_type as $key => $item)
                                                        @php
                                                        $selected = $eachitem['field_value']==$key?'selected':'';
                                                        @endphp
                                                        <option value="{{ $key }}" {{ $selected }}>{{ $item }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        @endforeach
                                    @endif
                                <tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-group">
                    <input type="hidden" name="state" id="state">
                    <input type="hidden" name="field_id" id="field_id">
                    <input type="hidden" name="field_type" id="field_type">
                    <input type="hidden" name="version" id="version">
                    <select name="rule" class="form-control" id="rule">
                        <option value="1">Send</option>
                        <option value="0">Don't Send</option>
                    </select>
                </div>
                <div class="form-group text-center">
                    <button type="button" onclick="saveSCMatrix()" class="btn purple-btn btn-sm">Save</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- The Modal -->
<div class="modal" id="myModal2">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Color</th>
                        <th>Discription</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <svg width="50" height="50">
                                    <rect width="50" height="50" style="fill:#49bd49d1;" />
                                </svg>
                            </td>
                            <td>Send</td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="50" height="50">
                                    <rect width="50" height="50" style="fill:#f7be14;" />
                                </svg>
                            </td>
                            <td>Send</td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="50" height="50">
                                    <rect width="50" height="50" style="fill:#FF8C00;" />
                                </svg>
                            </td>
                            <td>Do Not Send</td>
                        </tr>
                        <tr>
                            <td>
                                <svg width="50" height="50">
                                    <rect width="50" height="50" style="fill:#ff0000b8;" />
                                </svg>
                            </td>
                            <td> Do Not Send</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
