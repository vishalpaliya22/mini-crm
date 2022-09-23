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
                    <a href="{{ route('company.index') }}" class="float-right btn btn-secondary">Back</a>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
               
              
              <!-- info row -->
              <div class="row invoice-info">
                
                <div class="col-12">
                  <p class="lead"><b>Name of Company:</b> {{$data['company']->name}}</p>
                 
                </div>
                <div class="col-12">
                  <p class="lead"><b>Email of Company:</b> {{$data['company']->email}}</p>
                 
                </div>
                @php
                  if ($data['company']->logo != '') {
                    if(file_exists($data['company']->logo)){
                      $url = url(asset($data['company']->logo));
                    }
                    else{
                      $url = url(asset("uploads/preview.png"));
                    }
                  } else {
                    $url = url(asset("uploads/preview.png"));
                  }
                @endphp
                <div class="col-12">
                  <p class="lead"><b>Logo of Company:</b> <img src="{{$url}}" alt="profile Pic" height="auto" width="auto"></p>
                  <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    {{$data['company']->speaker_name}}
                  </p> -->
                </div>

                <div class="col-12">
                  <p class="lead"><b>Website of Company:</b> {{$data['company']->website}}</p>
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