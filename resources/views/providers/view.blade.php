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
    <div id="loader-img" style="display: none; position: fixed;top: 0;right: 0;bottom: 0;left: 0;background-color:#000;opacity: .75;z-index: 9999999;"><image src="{!! asset('/public/img/loading.gif') !!}" style="margin-top: 230px;margin-left: 630px;" width="200" height="110"></div>
    <div class="d-flex mb-3 back-btn">
        <div clas="flex-grow-1 total" style="width:100%"><span></span></div>
        <div clas=""><span><a href="{{ URL('/providers') }}">Back</a></span></div>
    </div>
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
            <button  data-url="#" class="btn purple-btn btn-sm pricemanipulation" data-toggle="modal" data-title="Formula Price Manipulation" data-target="#pricemanipulation">{{trans('messages.formula_price')}}</button>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="grid-outer">
        <table id="pharmacy_tabel" class="display" style="width:100%;display: none;font-size:11px;">
            <thead>
                <tr id="table_tr">
                    <th data-id="formulaId" width="95px">Formula#</th>
                    <th data-id="speedcode" width="95px">Speedcode</th>
                    <th data-id="formula" width="95px">Formula/Product</th>
                    <th data-id="formula" width="95px">Therapeutic Class</th>
                    <th data-id="" width="80px">Price</th>
                    <th data-id="action" class="nofilter">Action</th>
                </tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @if(!empty($formula_price))
                @foreach($formula_price as $key => $value)
                <tr>
                    <td>{{ $value['formula_id'] ? $value['formula_id'] : '' }}</td>
                    <td>{{ empty($value['pk_formula']) ? '' : !empty($value['pk_formula'][0]['SPEEDCODE']) ? $value['pk_formula'][0]['SPEEDCODE'] : '' }}</td>
                    <td>{{ $value['formula_id'] ? (!empty($formula_data) ? $formula_data[$value['formula_id']] : '') : '' }}</td>
                    <td>{{ empty($value['pk_formula']) ? '' : !empty($value['pk_formula'][0]['THERAPEUTIC_CLASS']) ? $value['pk_formula'][0]['THERAPEUTIC_CLASS'] : '' }}</td>
                    <td>{{ $value['price'] ? $value['price'] : '' }}</td>
                    <th>
                        @if((!empty($provider_data) && $provider_data[0]['provider_status'] == 3) && (!empty($value['pk_formula']) && $value['pk_formula'][0]['THERAPEUTIC_CLASS'] == 'ALLERGY TREATMENT'))
                        <a href="{{ url('provider/formula/view/'.$value['provider_id'].'/'.$value['formula_id']) }}"><i class="fa fa-eye" aria-hidden="true"></i></a> <a href="{{ url('provider/formula/edit/'.$value['provider_id'].'/'.$value['formula_id']) }}"><i class="fa fa-edit" aria-hidden="true"></i></a>
                        @endif
                    </th>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <!-- Formula Price Manipulation -->
    <div id="pricemanipulation" class="modal fade" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Formula Price Manipulation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ URL('/provider/updateprice') }}" method="post" class="add-new-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label>Formula/Product</label>
                                <select class="form-control" name="latest_formula_price" id="latest_formula_price"  style="width: 100%;" required="required">
                                    <option value='' disabled="disabled" selected="">Formula/Product</option>
                                    @if(!empty($formula_data))
                                    @foreach($formula_data as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
                                <label for="Price">Price</label>
                                <input type="text" class="form-control" name="formula_price" id="formula_price" placeholder="Price" required="required"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="csrftoken" id="csrftoken" value="{{csrf_token()}}">
                            <input type="hidden" name="provider_id" id="provider_id" value="{{ $provider_data ? $provider_data[0]['id'] : 0 }}">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn purple-btn btn-sm" value="Update Price">
                        </div>
                    </form>
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
    $("#latest_formula_price").select2();
});
</script>  
@stop
