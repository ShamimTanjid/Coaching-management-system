
@extends('Admin.master')
@section('main-conternt')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

                @if(Session::get('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Message : </strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">cLASS wise Batch List</h4>
                    </div>
                </div>

                
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="....">                        
                             <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-md">
                                            <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="classesid" required autofocus>Class Name</label>
                                        <div class="col-sm-9">

                                              <select name="class_id" class="form-control @error('class_id') is-invalid @enderror" id="classId" required autofocus>
                                                <option value="">--Select--Class--</option>
                                                @foreach($batch as $Batch)
                                                    <option value="{{$Batch->id}}">{{$Batch->classname}}</option>
                                                @endforeach
                                              </select>                                       
                                            @error('class_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="StudentTypeId" required autofocus>Student Type</label>
                                        <div class="col-sm-9">

                                              <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="StudenttypeId" required autofocus>
                                                <option value="">--Select--Class--</option>
                                                
                                              </select>                                       
                                            @error('student_type_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                            </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </td>
                           </tr>                                                                                     
                        </table>
                    </div>
                    <div class="table-responsive">
                    	<table class="table table-bordered table-hover text-center" id="batchlist">
                    		
                    	</table>
                    </div>
                
            </div>
        </div>
    </section>
    <!--Content End-->
    <style type="text/css">#overlay .loader{display: none}</style>
@include('Admin.includes.loader')


    <script>
      $('#classId').change(function (){
            
            var classId = $(this).val();

            if(classId){
             $('#overlay .loader').show();
               $.get("{{route('class-wise-student-type') }}",{ class_id:classId } , function (data){
                 
                 $('#overlay .loader').hide();
                 console.log(data);
                   $('#StudenttypeId').empty().html(data);
               });
            }else{
                $('#StudenttypeId').empty().html('<option value="">--Select--Student type--</option>');
            }
              
            
        })



    	$("#StudenttypeId").change(function (){
    		var StudenttypeId = $(this).val(); 
            var ClassId = $('#classId').val();
    		if(ClassId && StudenttypeId) { 
                $('#overlay .loader').show();
    		 $.get("{{ route('batch-list-by-ajax')}}",{
                class_id:ClassId,
                 type_id:StudenttypeId,
            }, function(data){
                $('#overlay .loader').hide();
    		 $("#batchlist").html(data); 
    		})
    		 }else{
                $("#batchlist").empty();

             }
    	})
     
    	
    </script>
@endsection