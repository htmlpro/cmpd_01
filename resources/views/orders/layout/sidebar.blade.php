<div class="side-bar custom-scrollbar-css">
    <div class="logo text-center y p-3 my-2"><img src="{!! asset('public/img/logo.png') !!}" alt="Logo" class="w-100" /></div>

    <div class="side-bar-menu" id="sideNavAccordion">
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#workflowManagement" role="button" aria-expanded="true">
            <img src="{!! asset('public/img/workflow-management-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Management </span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>
        <div class="collapse show" id="workflowManagement" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                @if(Auth::user()->role <= 3)
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Reception') { echo 'active'; }?>" href="{{ url('orders') }}">Order Reception</a>                
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Entry') { echo 'active'; }?>" href="{{ url('entry') }}">Order Entry</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Preverification') { echo 'active'; }?>" href="{{ url('preverification') }}">Order Pre Verification</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Filling') { echo 'active'; }?>" href="{{ url('filling') }}">Order Filling</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Verification') { echo 'active'; }?>" href="{{ url('verification') }}">Order Verification</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Dispatch') { echo 'active'; }?>" href="{{ url('dispatch') }}">Order Dispatch</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Invoice') { echo 'active'; }?>" href="{{url('invoice')}}">Order Invoice</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Problem On Hold') { echo 'active'; }?>" href="{{ url('onhold') }}">Order Problem Hold</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Delete') { echo 'active'; }?>" href="{{ url('order/delete') }}">Order Delete</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Order Complete') { echo 'active'; }?>" href="{{ url('complete') }}">Order Complete</a>                           
                <a class="d-block p-2 px-5 <?php if($stage_name === 'All Queue') { echo 'active'; }?>" href="{{ url('all') }}">Order All Queues</a>
                @else
                <a class="d-block p-2 px-5 <?php if($stage_name === 'All Queue') { echo 'active'; }?>" href="{{ url('providerallqueue') }}">Order All Queues</a>               
                @endif
            </div>
        </div>
        @if(Auth::user()->role <= 3)
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#micsellaneous" role="button" aria-expanded="false" >
            <img src="{!! asset('public/img/miscllaneous-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Miscellaneous</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>
        <div class="collapse" id="micsellaneous" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                <a class="d-block p-2 px-5" <?php if($stage_name === 'Patient') { echo 'active'; }?> href="{{ url('patients') }}">Patients</a>
				<a class="d-block p-2 px-5" <?php if($stage_name === 'Provider') { echo 'active'; }?> href="{{ url('providers') }}">Providers</a>
                <a class="d-block p-2 px-5 <?php if($stage_name === 'Print Label/Print') { echo 'active'; }?>" href="{{ url('print') }}">Print Label/Invoice</a>
            </div>
        </div>
        @endif
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#reports" role="button" aria-expanded="false">
            <img src="{!! asset('public/img/reports-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Reports</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>
        <div class="collapse" id="reports" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                 <a class="d-block p-2 px-5" href="{{ url('/prescriptionreports') }}">Prescription Reports</a>
            </div>
        </div>
        @if(Auth::user()->role==1)
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#matrix" role="button" aria-expanded="false">
            <img src="{!! asset('public/img/workflow-management-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Manage PMP Matrix</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>
        <div class="collapse" id="matrix" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                 <a class="d-block p-2 px-5" href="{{ route('matrix.index') }}">PMP Matrix</a>
            </div>
        </div>
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#pharmacy_info" role="button" aria-expanded="false">
            <img src="{!! asset('public/img/workflow-management-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Pharmacy Master</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>
        <div class="collapse" id="pharmacy_info" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                 <a class="d-block p-2 px-5" href="{{ route('pharmacyinfo.index') }}">Pharmacy Info</a>
            </div>
        </div>
        @endif
        <div class="collapse" id="usermanagement" data-parent="#sideNavAccordion">
            <div class="sub-menu">
            </div>
        </div>

    </div>
</div>