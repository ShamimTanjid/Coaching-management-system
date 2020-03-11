

@extends('Admin.master')
@section('main-conternt')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

            @include('Admin.includes.alert');

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Batch Add Form</h4>
                    </div>
                </div>

                <form action="{{route('BatchInsert')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-bordered dt-responsive nowrap text-center" style="width: 100%;">                             
                             <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="classsid" required autofocus>Class Name</label>
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
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="classsid" required autofocus>Student type</label>
                                        <div class="col-sm-9">

                                              <select name="student_type_id" class="form-control @error('student_type_id') is-invalid @enderror" id="StudenttypeId"  autofocus>
                                                <option value="">--Select--Student type--</option>
                                                
                                              </select>                                       
                                            @error('student_type_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>



                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="batch_name">Batch Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('batchname') is-invalid @enderror" name="batchname" id="batch_name" placeholder="Write your Batch Name" value="{{ old('batchname') }}" required>
                                            @error('batchname')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr> 
                            <tr>
                                <td>
                                    <div class="form-group row mb-0">
                                        <label class="col-form-label col-sm-3 text-right" for="student-capacity">Student Capacity</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control @error('studentcapacity') is-invalid @enderror" name="studentcapacity" id="studentcapacity" placeholder="Write your Batch Name" value="{{ old('studentcapacity') }}" required>
                                            @error('studentcapacity')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>                                                          

                            <tr><td><button type="submit" class="btn btn-block my-btn-submit">Submit</button></td></tr>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
    <style type="text/css">#overlay .loader{display: none}</style>
@include('Admin.includes.loader')


    <script type="text/javascript">
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
            
    </script>
@endsection