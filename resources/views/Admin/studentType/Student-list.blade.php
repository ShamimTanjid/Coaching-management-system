@extends('Admin.master')
@section('main-conternt')
 <!--Main Menu End-->

<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-12 pl-0 pr-0">


        @if(Session::get('message'))
               <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Message: </strong>{{ Session::get('message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif


              @if(Session::get('error_message'))
               <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Message: </strong>{{ Session::get('error_message') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              @endif



            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Add New Student Type<button class="bg-success text-light" data-toggle="modal" data-target="#studentTypeAddmodal">Add New</button></h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Class Name</th>
                        <th>Student Type</th>   
                        <th>Status</th>                                         
                        <th style="width: 100px;">Action</th>
                    </tr>
                    </thead>
                    <tbody id="studentypetable">
                        @include('Admin.studentType.student-type-table');
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>




@include('Admin.studentType.modal.add-form-modal');
@include('Admin.studentType.modal.edite-studenttype');





<script type="text/javascript">
    $('#studenttypeinsert').submit(function (e){
        e.preventDefault();
        var url=$(this).attr('action');
        var data = $(this).serialize();
        var method = $(this).attr('method');
        $('#studentTypeAddmodal #reset').click();
        $('#studentTypeAddmodal').modal('hide');
        $.ajax({
            data : data,
            type : method,
            url : url,
            success:function(){
                $.get("{{route('student-type-list')}}", function (data){
                   $('#studentypetable').empty().html(data);
                })
            }

        })
    });
    function studenttypeunpublished(id){
             $.get("{{route('student-type-unpublished') }}",{id:id}, function (data){
                //console.log(data);
                $('#studentypetable').empty().html(data);
             });
        }

        function studenttypepublished(id){
             $.get("{{route('student-type-published') }}",{id:id}, function (data){
                //console.log(data);
                $('#studentypetable').empty().html(data);
             });
        }

        function studenttypedite(id,stytype){
            $('#studenttypeEditemodal').find('#student_type').val(stytype);
            $('#studenttypeEditemodal').find('#typeId').val(id);
            $('#studenttypeEditemodal').modal('show');
        }

        $('#studenttypeUpdate').submit(function (e){
            e.preventDefault(data);
            var url=$(this).attr('action');
        var data = $(this).serialize();
        var method = $(this).attr('method');
        $('#studenttypeEditemodal #reset').click();
        $('#studenttypeEditemodal').modal('hide');
        $.ajax({
            data : data,
            type : method,
            url : url,
            success:function(data){
                
                   $('#studentypetable').empty().html(data);
                
            }

        })
        })
        

        function studenttypeDelete(id){
           var msg='If you want to delete this item press ok';
           if(confirm(msg)){
            $.get("{{route('student-type-delete') }}",{type_id:id}, function (data){
                //console.log(data);
                $('#studentypetable').empty().html(data);
             });
           }
        }
</script>

@endsection()