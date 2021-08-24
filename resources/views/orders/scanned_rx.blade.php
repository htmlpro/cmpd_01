@foreach($rx_details as $rx => $val)   
<div class="card">
    <div class="card-header" id="headingFive">
        <h5 class="mb-0">
            <div class="collapsed" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">\n\
                <i class="fa fa-caret-right"></i>Scanned Rx Details
            </div>
        </h5>
    </div>
    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <b>Order#:</b> {{ $val['order_id'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Provider:</b> {{ $val['order']['provider']['last_name'] .' '. $val['order']['provider']['first_name'] }}
                </div>
                <div class="col">
                    <b>Practise:</b> {{ $val['order']['provider']['bussiness_name'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Patient:</b> {{ $val['order']['patient']['last_name'] .' '. $val['order']['patient']['first_name'] }} </div>
                <div class="col">
                    <b>Pt. DOB:</b> {{ $val['order']['patient']['dob'] }}
                </div>
            </div>\n\
            <div class="row">
                <div class="col">
                    <b>Medication:</b> {{ $val['formula']['formula_short'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Address:</b>{{ $val['order']['provider']['reg_address1'] }}
                </div>
                <div class="col">
                    <b>Address2:</b>{{ $val['order']['provider']['reg_address2'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>City:</b>{{ $val['order']['provider']['reg_city'] }}
                </div>
                <div class="col">
                    <b>State:</b>{{ $val['order']['provider']['reg_state'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Zip:</b>{{ $val['order']['provider']['reg_zip'] }}
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <b>Due Date:</b>
                </div>
                <div class="col">
                    <b>Received By:</b>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach