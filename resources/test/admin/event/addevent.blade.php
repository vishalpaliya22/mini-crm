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
            <form class="form" id="quickForm" name="adminfrm" method="post" action="{{ route('merchant.store') }}">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                  
                  <div class="form-group">
                    <label for="exampleInputName1">Admin Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Enter name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address <req>*</req></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password <req>*</req></label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter password">
                  </div>
                  <!-- <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                      <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                    </div>
                  </div> -->
                    <div class="form-group">
                        <label>Select Status :</label>
                        <select class="form-control" name="status">
                          <option value="1" @if(old('status') == '1') selected @endif>Active</option>
                          <option value="0" @if(old('status') == '0') selected @endif>Inactive</option>
                        </select>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
                    <a href="{{ route('event.index') }}" class="btn btn-secondary">Cancel</a>
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

<script src="{{ asset('vendor/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('vendor/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- jquery-validation -->
<script src="{{ asset('vendor/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('vendor/plugins/jquery-validation/additional-methods.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('vendor/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      alert( "Form successful submitted!" );
    }
  });
  $('#quickForm').validate({
    rules: {
      name: {
        required: true,
        name: true,
      },
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      name: {
        required: "Please enter a your name",
        name: "Please enter a vaild name"
      },
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      // terms: "Please accept our terms"
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
