@extends('Admin.master')
@section('main-conternt')
 <!--Main Menu End-->

<!--Content Start-->
<section class="container-fluid">
    <div class="row content">
        <div class="col-md-8 offset-md-2 pl-0 pr-0">

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
                    <h4 class="text-center font-weight-bold font-italic mt-3">{{$usser->name}}'s profile</h4>
                </div>
            </div>

            <div class="table-responsive p-1">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="...">
                    
                       <tr> <td colspan="2"><img src="@if(isset($usser->avatar)){{URL::to($usser->avatar)}}@else {{asset('/')}}/Admin/assets/images/avatar.png @endif"></td></tr>
                       
                         <tr><th>Name</th> <td>{{$usser->name}}</td></tr>
                         <tr><th>role</th> <td>{{$usser->role}}</td></tr>
                         <tr><th>Mobile</th>  <td>{{$usser->mobile}}</td></tr>
                        <tr><th>Email Address</th> <td>{{$usser->email}}</td></tr>
                        <tr>
                        	<th style="width: 100px;">Action</th>
                        	<td>
                            <a href="{{route('change-user-info',['id'=>$usser->id])}}" class="btn btn-sm btn-dark">Change Info</a>
                            <a href="{{route('change-user-avatar',['id'=>$usser->id])}}" class="btn btn-sm btn-info">Change photo</a>
                            <a href="{{route('change-user-password',['id'=>$usser->id])}}" class="btn btn-sm btn-danger">Change password</a>
                            </td>
                        </tr>
                
                   
                    
                </table>
            </div>
        </div>
    </div>
</section>
<!---->
<!--Content End-->

@endsection()