@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Driver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Drivers</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
       

          <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        {{-- <h3 class="card-title">Data Table With Full Features</h3> --}}
                    </div>
                    <div class="col-md-6" >
                        <a href="{{url('/driver/create')}}" class="btn btn-primary" style="float:right">Add Driver</a>
                    </div>
                </div>
             
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Driver Name</th>
                  <th>Phone No</th>
                  <th>Aadhar Card</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                @foreach($truckdata as $trucklist)
                <tr class="rownew_{{$trucklist->id}}">
                  <td>{{ucwords($trucklist->driver_name)}}</td>
                  <td>{{$trucklist->driver_phone}}</td>
                  <td>{{$trucklist->aadhar_card}}</td>
                
                  <td><a href="/driver/edit/{{$trucklist->id}}" class="px-2 mr-2"> <button class="btn btn-primary"><i class="fa fa-edit" ></i></button></a>
                    <button class="btn btn-danger delbtn" type="button" id="{{$trucklist->id}}"><i class="fa fa-trash" ></i></button>
                    <a href="/driver/show/{{$trucklist->id}}" class="px-2 mr-2"><button class="btn btn-success"><i class="fa fa-eye" ></i></button></a>
                </td>
                  
                </tr>
                @endforeach
              </tbody>
                {{-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> --}}
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <button class="btn btn-danger" name="archive" type="submit" onclick="archiveFunction()">
        <i class="fa fa-archive"></i>
            Archive
    </button>
      <!-- /.row -->
    </section>

    {{-- modal start --}}

    <!-- /.content -->

  </div>

  <script>
   $(document).ready(function(){

   
   $('#example2').DataTable({
     "paging": true,
     "lengthChange": false,
     "searching": true,
     "ordering": true,
     "info": true,
     "autoWidth": false
 
 });

   })
  </script>
  <script>
    $(document).on('click','.delbtn',function(){
          var id=this.id;

          swal({
          title: "Are you sure?",
          text: "But you will still be able to retrieve this Controller.",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55",
          confirmButtonText: "Yes, archive it!",
          cancelButtonText: "No, cancel please!",
          closeOnConfirm: true,
          closeOnCancel: false
        },
        function(isConfirm){
          if (isConfirm) {
            $.ajax({
                    url:"{{route('delete_driver')}}",
                    data:{'id':id},
                    type:'GET',
                    success:function(data)
                    {
                        
                        $('.rownew_'+id).remove();
                        swal("Success", "Deleted:)", "success");
                    }
                })          // submitting the form when user press yes
          } else {
            swal("Cancelled", "Your Category  is safe :) ", "error");
          }
        });
          
          
      })
</script>
@endsection