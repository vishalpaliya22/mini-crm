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
            <form class="form" id="quickForm" name="adminfrm" enctype="multipart/form-data" method="post" action="{{route('company.update', $company->id)}}"  >
                {{csrf_field()}}
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="companyTitle">Title of Company:</label>
                    <input type="text" name="title" value="{{$company['name']}}" class="form-control" id="companyTitle" placeholder="Enter Company Name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email Address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"  value="{{$company['email']}}" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="companyImage">Logo of company:</label>
                    @if(!empty($company['logo']) && file_exists($company['logo']))
                        <img id="blah" src="{{ URL::to($company['logo']) }}" width="auto" height="auto" alt="Image Not Found"/>
                     @else
                        <img id="blah" width="100" height="auto" src="{{asset('uploads/preview.png')}}" alt="preview Image"/>
                    @endif
                    <input type="file" id="companyImage" class="imageUpload form-control form-control-solid" name="image" value="{{ old('image',$company['logo'] ?? null) }}" onchange="readURL(this);" accept="image/*"/>
                  </div>
                  <div class="form-group">
                    <label for="fullContent">Website:</label>
                    <input type="text" class="form-control form-control-solid" name="url" id="url" value="{{$company['website']}}">
                  </div>
                  
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary mr-2">Update</button>
                    <a href="{{ route('company.index') }}" class="btn btn-secondary">Back</a>
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
<script>
  $(function () {
    //Date picker
    $('#reservationdate').datetimepicker({
        // format: 'L'
        format: 'DD-MM-YYYY'
    });
  }) 
  $(function () {
    // Summernote
    $('#summernote').summernote({
      height: 150,
    });
    $('#fullContent').summernote({
      height: 150,
    });

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script> 
@endsection