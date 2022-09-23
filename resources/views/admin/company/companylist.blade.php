{{-- Extends layout --}}
@extends('admin.layout.default')
{{-- Content --}}
@section('content')
  <div class="content-wrapper">
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
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{$page_description}}</h3>
              </div>
              @if (Session::has('message'))
              <div class="alert-close">
                <div class="alert alert-success">{{Session::get('message')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
              </div>
              @endif
              @if (Session::has('error_msg'))
              <div class="alert-close">
                <div class="alert alert-danger">{{Session::get('error_msg')}}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                </div>
              </div>
              @endif
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Company Name</th>
                      <th>Email</th>
                      <th>Logo</th>
                      <th>website</th>
                      <th data-orderable="false">Action</th>
                    </tr>
                  </thead> 
                  <tbody>
                    @foreach($companyList as $company)
                      <tr>
                        <input type="hidden" class="delete_id" value="{{$company->id}}">
                        
                        <td>{{$company->name}}</td>
                        <td>{{$company->email}}</td>
                        <td>
                          @php
                            if ($company->logo != '') {
                              if(file_exists($company->logo)){
                                $url = url(asset($company->logo));
                              }
                              else{
                                $url = url(asset("uploads/preview.png"));
                              }
                            } else {
                              $url = url(asset("uploads/preview.png"));
                            }
                          @endphp
                          <img src="{{$url}}" alt="logo" height="50" width="50">
                        </td>
                        <td>{{$company->website}}</td>
                        <td> 
                            <a href="{{ route('company.show', $company->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-eye"></i></a> |
                            <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit"></i></a> | 
                            @csrf
                            <button type="button" class="confirm_delete btn btn-danger btn-sm"><i class="fa fa-fw fa-times"></i></button>
                        </td>
                      </tr>
                    @endforeach 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Company Name</th>
                      <th>Email</th>
                      <th>Logo</th>
                      <th>website</th>
                      <th data-orderable="false">Action</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
  
{{-- Scripts Section --}}
@section('scripts')
<!-- Page specific script -->
<script>
  $(document).ready(function () {
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $('.confirm_delete').click(function (e) {
        e.preventDefault();

        var delete_id = $(this).closest("tr").find('.delete_id').val();
        
        swal({
          title: "Are you sure you want to delete?",
          text: "If you delete this, it will be gone forever.",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            var data = {
              "_token" : $('input[name=_token]').val(),
              "id" : delete_id,
            };
            var url = "{{URL('/admin/company/')}}";
            var dltUrl = url+"/"+delete_id;
            
            $.ajax({
              type: "DELETE",
              url: dltUrl,
              data: data,
              success: function(response) {
                swal(response.message, {
                  icon: "success",
                })
                .then((result) => {
                    location.reload();
                });
              }
            });
          } 
          else {
            swal("Your imaginary record is safe!", {
              icon: "success",
            });
          }
        });
    });
  });
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      // "paging": false,
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endsection
 