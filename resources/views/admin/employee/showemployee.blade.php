{{-- Extends layout --}}
@extends('admin.layout.default')

{{-- Content --}}
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{$page_title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">{{$page_title}}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
                    <!-- <small class="float-right">Date: 2/10/2014</small> -->
                    <a href="{{ route('employee.index') }}" class="float-right btn btn-secondary">Back</a>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
               
              
              <!-- info row -->
              <div class="row invoice-info">
                
                <div class="col-12">
                  <p class="lead"><b>First Name of Employee:</b> {{$data['employee']->first_name}}</p>
                 
                </div>
                <div class="col-12">
                  <p class="lead"><b>Last Name of Employee:</b> {{$data['employee']->last_name}}</p>
                 
                </div>
                <div class="col-12">
                  <p class="lead"><b>Email of Employee:</b> {{$data['employee']->email}}</p>
                 
                </div>
                <div class="col-12">
                  <p class="lead"><b>Phone Number of Employee:</b> {{$data['employee']->phone_no}}</p>
                </div>
                <div class="col-12">
                  <p class="lead"><b>Company Name of Employee:</b>
                    <span class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                      {{ $data['employee']->CompanyName }}
                    </span>
                  </p>
                </div>
              </div>
             
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
@endsection
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
@section('scripts')

@endsection