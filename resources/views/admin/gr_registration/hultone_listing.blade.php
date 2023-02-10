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
       
        @if(session()->has("danger"))
            <div class="alert alert-danger" style="text-align: center;" role="alert">
                {{session()->get("danger")}}
            </div>
            @endif 

        @if(session()->has("success"))
          <div class="alert alert-success" style="text-align: center;" role="alert">
                {{session()->get("success")}}
          </div>
          @endif

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
                  <th>Hul Tone Sr. No.</th>
                  <th>Hul Tone</th>
                  <th>Price (INR)</th>
                  <th>Action</th>
                  
                </tr>
                </thead>
                <tbody>
                
                <!-- <tr>
                  <td>1</td>
                  <td>1</td>
                  <td>1</td>
                  <td><a href="{{route('admin.gr-register.editHulTone',1)}}" class="px-2 mr-2"> <button class="btn btn-primary"><i class="fa fa-edit" ></i></button></a>
                    <button class="btn btn-danger delbtn" type="button" ><i class="fa fa-trash" ></i></button>
                </td>
                  
                </tr> -->
                
             
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
  <!-- <script>
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
  </script> -->
@endsection


@section('js')
<script>
  function dataTableHit(dataGET){
      $("#example2").dataTable().fnDestroy();
      $('#example2').dataTable({
             // /dom: "Bfrtip",
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": "{{ route('admin.gr-register.hulTone') }}",
                "type": "POST",
                "data" : dataGET,
              complete:function(){

                // if($("#basic-datatables_wrapper").find(".wrap_all").length <= 0){

                //   $('#basic-datatables_info,#basic-datatables_paginate').wrapAll('<div class="wrap_all"></div>'); 
                // }

              }

            },
            createdRow: function( row, data, dataIndex ) {

              $( row ).find('td:eq(1)').attr('data-id', data['id']).attr('key_type','tone_serial_number');
              $( row ).find('td:eq(2)').attr('data-id', data['id']).attr('key_type','hul_tone');
              $( row ).find('td:eq(3)').attr('data-id', data['id']).attr('key_type','price');
              
            },
            "columns": [
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'tone_serial_number', name: 'tone_serial_number'},
              {data: 'hul_tone', name: 'hul_tone'},
              {data: 'price', name: 'price'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
            ],
 
        });
    }


    $(document).ready(function(){
        let data = {
          '_token': "{{csrf_token()}}"
        }

        dataTableHit(data);



        $(document).on("click", '.delbtn',function(e) {
          var id = $(this).attr('data-id');
          var obj = $(this);
          // console.log({id});
          swal({
            title: "Are you sure?",
            text: "Are you sure you want to delete?",
            type: "warning",
            showCancelButton: true,
          }, function(willDelete) {
            if (willDelete) {
              $.ajax({
                url: "{{ route('admin.gr-register.deleteHulTone')}}",
                type: 'POST',
                data: {
                  '_token': "{{csrf_token()}}",
                  id: id
                },
                // dataType: "JSON",
                // headers: {
                //   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                // },
                success: function(response) {
                  let __data = {
                    '_token': "{{csrf_token()}}"
                  }

                  dataTableHit(__data);



                  swal({
                    title: "",
                    text: "Hul Tone deleted successfully.",
                    type: "success",
                    showCancelButton: false,
                  }, function(willDelete) {
                    if (willDelete) {
                      
                    } 
                  });



                }
              });
            } 
          });
        });


    })

    $('.alert').delay(3000).fadeOut(300);
    
  </script>
@endsection()