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
            <form class="form" id="quickForm" name="adminfrm" enctype="multipart/form-data" method="post" action="{{ route('company.store') }}">
                {{csrf_field()}}
                <div class="card-body">
                  <div class="form-group">
                    <label for="companyTitle">Name:</label>
                    <input type="text" name="title" class="form-control" id="companyTitle" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address <req>*</req></label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="newsImage">Logo:</label>
                    <img id="logo" src="{{asset('uploads/preview.png')}}" width="auto" height="auto" style="margin-left: 20px;" />
                            
                    <input type="file" id="newsImage" class="form-control form-control-solid imageUpload" name="image" accept="image/*" onchange="readURL(this);" />
                  </div>
                  <div class="form-group">
                    <label for="fullContent">Website:</label>
                    <input type="text" class="form-control form-control-solid" name="url" id="url" value="{{old('url')}}">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Add</button>
                    <a href="{{ route('company.index') }}" class="btn btn-secondary">Cancel</a>
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
        title: {
          required: true,
        },
        /*email: {
          required: true,
        },
        url: {
          required: true,
        }*/
      },
      messages: {
        title: {
          required: "Please enter a name"
        },
        /*email: {
          required: "Please enter a email"
        },
        url: {
          required: "Please enter a your website URL"
        }*/
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
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#logo').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>

@endsection