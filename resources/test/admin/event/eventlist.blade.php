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
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Images</th>
                      <th>Title</th>
                      <th>Speaker Name</th>
                      <th>Participant</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead> 
                  <tbody>
                    @foreach($eventList as $event)
                      <tr>
                        <input type="hidden" class="delete_id" value="{{$event->id}}">
                        <td>{{$event->images}}</td>
                        <td>{{$event->title}}</td>
                        <td>{{$event->speaker_name}}</td>
                        <td>{{$event->No_of_participant}}</td>
                        <td>{{$event->date}}</td>
                        <td><span class="right badge {{$event->status == 1 ? 'badge-success' : 'badge-danger'}}">{{$event->status == 1 ? 'Active' : 'Inactive'}}</span></td>
                        <td> 
                            <a href="{{ route('event.edit', $event->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-fw fa-edit"></i></a> | 
                            @csrf
                            <button type="button" class="confirm_delete btn btn-danger btn-sm"><i class="fa fa-fw fa-times"></i></button>
                        </td>
                      </tr>
                    @endforeach 
                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Images</th>
                      <th>Title</th>
                      <th>Speaker Name</th>
                      <th>Participant</th>
                      <th>Date</th>
                      <th>Status</th>
                      <th>Action</th>
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
<!-- AdminLTE App -->
<!-- <script src="{{ asset('vendor/dist/js/adminlte.min.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="{{ asset('vendor/dist/js/demo.js') }}"></script> -->
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

            $.ajax({
              type: "DELETE",
              url: '/admin/event/'+delete_id,
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
 