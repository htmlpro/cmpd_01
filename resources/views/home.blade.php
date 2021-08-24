@extends('layouts.app')
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
                <div class="card-header">Main Area</div>
                    
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
