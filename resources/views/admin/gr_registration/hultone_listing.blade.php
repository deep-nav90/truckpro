@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Hul Tone List</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Hul Tone</li>
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
                    </div>
                    <div class="col-md-6" >
                        <a href="{{route('admin.gr-register.storeHulTone')}}" class="btn btn-primary" style="float:right">Add</a>
                    </div>
                </div>
             
              
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sr No.</th>
                  <th>Tone Sr. No.</th>
                  <th>Tone</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td><a href="{{route('admin.gr-register.editHulTone',1)}}" class="px-2 mr-2"> <button class="btn btn-primary"><i class="fa fa-edit" ></i></button></a>
                    <button class="btn btn-danger delbtn" type="button" ><i class="fa fa-trash" ></i></button>
                </td>
                  
                </tr>
                
             
              </tbody>
                
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