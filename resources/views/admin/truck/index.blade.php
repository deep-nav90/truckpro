@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trucks</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trucks</li>
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
                        <a href="{{url('/truck/create')}}" class="btn btn-primary" style="float:right">Add Truck</a>
                    </div>
                </div>
             
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr no</th>
                  <th>Truck no</th>
                  <th>Truck Type</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                <?php $sr=1;?>
                @foreach($trucklist as $truckdata)
                <tr class="rownew_{{$truckdata->id}}">
                  <td>{{$sr}}</td>
                  <td>{{ucwords($truckdata->truck_no)}}</td>
                  <td>@if($truckdata->truck_type==1) NMCC @else Other @endif </td>
                  <td><a href="/driver/edit/{{$truckdata->id}}" class="px-2 mr-2"> <button class="btn btn-primary"><i class="fa fa-edit" ></i></button></a>
                    <button class="btn btn-danger delbtn" type="button" id="{{$truckdata->id}}"><i class="fa fa-trash" ></i></button>
                    <a href="/driver/show/{{$truckdata->id}}" class="px-2 mr-2"><button class="btn btn-success"><i class="fa fa-eye" ></i></button></a>
                </td>
                  
                </tr>
                <?php $sr++; ?>
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
      <!-- /.row -->
    </section>
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
@endsection