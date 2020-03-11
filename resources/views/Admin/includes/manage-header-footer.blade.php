
@extends('Admin.master')
@section('main-conternt')

<!--Content Start-->
<section class="container-fluid">
    <div class="row content ">
        <div class="col-12 pl-0 pr-0">
            <div class="form-group">
                <div class="col-sm-12">
                    <h4 class="text-center font-weight-bold font-italic mt-3">Header Footer Add form</h4>
                </div>
            </div>
    <form method="POST" action="{{route('header-footer-update',$headerfooter->id)}}" enctype="multipart/form-data" autocomplete="" class="form-inline">
                @csrf

            

                <div class="form-group col-12 mb-3">
                    <label for="ownerName" class="col-sm-3 col-form-label text-right">Owner Name</label>
                    <input id="ownerName" type="text" class="col-sm-9 form-control @error('ownername') is-invalid @enderror" name="ownername" value="{{$headerfooter->ownername}}" placeholder="Owner Name" required autofocus>

                                  @error('ownername')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="ownerdepartment" class="col-sm-3 col-form-label text-right">Owner Department</label>
                    <input id="ownerdepartment" type="text" class="col-sm-9 form-control @error('ownerdepartment') is-invalid @enderror" name="ownerdepartment" value="{{$headerfooter->ownerdepartment}}" placeholder="Owner Department" required autofocus>

                                  @error('ownerdepartment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                </div>

                <div class="form-group col-12 mb-3">
                <label for="mobile" class="col-sm-3 col-form-label text-right">Mobile</label>
                <input id="mobile" type="text" class="col-sm-9 form-control @error('mobile') is-invalid @enderror" name="mobile"value="{{$headerfooter->mobile}}" placeholder="8801xxxxxxxxx" required autofocus>
                                  @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="address" class="col-sm-3 col-form-label text-right">Address</label>
                    <input id="address" type="text" class="col-sm-9 form-control @error('address') is-invalid @enderror" name="address" value="{{$headerfooter->address}}" required placeholder="Address">

                               @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>  
                                    </span>
                                @enderror
                </div>

                <div class="form-group col-12 mb-3">
                    <label for="copyright" class="col-sm-3 col-form-label text-right">CopyRight</label>
                    <input id="copyright" type="text" class="col-sm-9 form-control @error('copyright') is-invalid @enderror" name="copyright" value="{{$headerfooter->copyright}}" required  placeholder="Copy Right">


                               @error('copyright')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>

                

                

                <div class="form-group col-12 mb-3">
                    <label class="col-sm-3"></label>
                    <button type="submit" class="col-sm-9 btn btn-block my-btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection