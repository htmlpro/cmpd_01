@extends('layouts.app')
@section('sidebar')
<div class="side-bar">
    <div class="logo text-center y p-3 my-2"><img src="{!! asset('public/img/logo.png') !!}" alt="Logo" class="w-100" /></div>

    <div class="side-bar-menu" id="sideNavAccordion">
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#workflowManagement" role="button" aria-expanded="true">
            <img src="{!! asset('public/img/workflow-management-icon.png)!}}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Management</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>

            <div class="clearfix"></div>
        </a>
        <div class="collapse show" id="workflowManagement" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                <a class="d-block p-2 px-5 active" href="{{ url('orders') }}">Order Reception</a>
                <a class="d-block p-2 px-5" href="{{ url('print') }}">Print Label/Worksheet</a>
                <a class="d-block p-2 px-5" href="{{ url('orders') }}">Order Entry</a>
                <a class="d-block p-2 px-5" href="#!">Order Pre Verification</a>
                <a class="d-block p-2 px-5" href="#!">Order Filing</a>
                <a class="d-block p-2 px-5" href="#!">Order Verification</a>
                <a class="d-block p-2 px-5" href="#!">Order Dispatch</a>
                <a class="d-block p-2 px-5" href="#!">Order Invoice</a>
                <a class="d-block p-2 px-5" href="#!">Order Problem Hold</a>
                <a class="d-block p-2 px-5" href="#!">Order Delete</a>
                <a class="d-block p-2 px-5" href="#!">Order Complete</a>
                <a class="d-block p-2 px-5" href="#!">Order All Queues</a>
            </div>
        </div>
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#micsellaneous" role="button" aria-expanded="false" >
            <img src="{!! asset('public/img/miscllaneous-icon.png') !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Micsellaneous</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>

        <div class="collapse" id="micsellaneous" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                <a class="d-block p-2 px-5" href="{{ url('patients') }}">Patients</a>

            </div>
        </div>
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#reports" role="button" aria-expanded="false">
            <img src="{!! asset('public/img/reports-icon.png) !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">Reports</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>

        <div class="collapse" id="reports" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                <a class="d-block p-2 px-5" href="#!">Order Reception</a>
            </div>
        </div>
        <a class="nav d-block p-3 mb-1" data-toggle="collapse" href="#usermanagement" role="button" aria-expanded="false">
            <img src="{!! asset('public/img/user-management-icon.png) !!}" alt="workflow Management" class="d-inline-block mr-2 align-middle"/> 
            <span class="d-inline-block  align-middle">User Management</span>

            <div class="sidenav-arrow d-inline-block float-right">
                <i class="fas fa-chevron-right align-middle mt-2"></i>
                <i class="fas fa-chevron-down align-middle  mt-2"></i>
            </div>
            <div class="clearfix"></div>
        </a>

        <div class="collapse" id="usermanagement" data-parent="#sideNavAccordion">
            <div class="sub-menu">
                <a class="d-block p-2 px-5" href="#!">Order Reception</a>
            </div>
        </div>

    </div>
</div>
@endsection
@section('headingstart')
<header class="p-3">
    <div class="float-left mt-2 mr-3">
        <span class="sidebar-hide-show"><i class="fas fa-bars"></i></span>
    </div>
    <div class="heading float-left">
        Order Listing
    </div>
    @endsection
    @section('headingend')
</header>
@endsection
<div class="sidebar">
    <br /><br />
    <div></div>
    <a class="active" href="#home">Workflow Management</a>
    <a href="{{ url('orders') }}">Order Reception</a>
    <a href="{{ url('pdf') }}">PDF</a>
    <a href="#news">Miscellaneous</a>
    <a href="{{ url('patients') }}">Patients</a>
    <a href="#contact">Reports</a>
    <a href="#about">User Management</a>
</div>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2 class="sub-header">Main Area</h2></div>
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-9">
                            <a href="{{ url('admin/posts/new-post')}}" class="btn btn-primary btn-sm">Add New Order</a>
                        </div>
                        <br><br>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped" id="allposts">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
