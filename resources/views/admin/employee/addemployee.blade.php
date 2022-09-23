{{-- Extends layout --}}
@extends('admin.layout.default')
@section('styles')
<style>
    .imageUpload {
        background-color: #F3F6F9;
        border-color: #F3F6F9;
        color: #3F4254;
        transition: color 0.15s ease, background-color 0.15s ease, border-color 0.15s ease, box-shadow 0.15s ease;
        margin-top: 14px;
        height: 44px;
        /*width: 40%;*/ 
    } 
</style>
@endsection
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">{{$page_description}}</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            @if($errors->any())
            <div class="alert-close">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach   
                </div>
            </div>
            @endif
            @if (Session::has('message'))
              <div class="alert-close">
                <div class="alert alert-success">{{Session::get('message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
              </div>
            @endif
            <form class="form" id="quickForm" name="adminfrm" enctype="multipart/form-data" method="post" action="{{ route('employee.store') }}">
                {{csrf_field()}}
                <div class="card-body">
                  
                  <div class="form-group">
                      <label>Company Name:</label>
                      <select class="form-control" name="CompanyName">
                          <option value="{{old('CompanyName')}}" disabled selected>{{old('CompanyName') ?? 'Choose your Company Name'}}</option>
                          @foreach ($companyList as $com)
                          <option value="{{$com->id}}">{{$com->name}}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" name="FName" class="form-control" id="first_name" placeholder="Enter first name">
                  </div>
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" name="LName" class="form-control" id="last_name" placeholder="Enter last name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address <req>*</req></label>
                    <input type="email" name="Email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="phNumber">Phone No</label>
                    <input type="number" name="phoneNumber" class="form-control" min="1" id="phNumber" placeholder="Enter phone number">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
                    <a href="{{ route('employee.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection


@section('scripts')
<!-- Page specific script -->
<script>
  $(function () {
    // $.validator.setDefaults({
    //   submitHandler: function () {
    //     alert( "Form successful submitted!" );
    //   }
    // });
    $('#quickForm').validate({
      rules: {
        FName: {
          required: true,
        },
        LName: {
          required: true,
        }
      },
      messages: {
        FName: {
          required: "Please enter a first name"
        },
        LName: {
          required: "Please enter a last name"
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  }); 
     
</script>

@endsection