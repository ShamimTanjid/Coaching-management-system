<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="studenttypeEditemodal" tabindex="-1" role="dialog" aria-labelledby="studentTypeAddmodalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{route('student-type-update')}}" id="studenttypeUpdate"> 
      @csrf
      <div class="modal-body">
   {{-- 
       <div class="form-group row mb-0">
       <label class="col-form-label col-sm-3 text-right" for="classsid" required autofocus>Class Name
       </label>
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
       --}} 


       <div class="form-group row">
         <label class="col-form-label col-sm-3 text-right" for="student_type">Student Type Edite</label>
            <div class="col-sm-9">
             <input type="text" class="form-control @error('student_type') is-invalid @enderror"
                name="student_type" id="student_type" placeholder="Studdent Type"  required>
                     @error('student_type')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                 @enderror
                </div>
            </div>
         
          <input type="hidden" name="type_id" id="typeId">

      </div>
      <div class="modal-footer">
        <button type="button" class="d-none" data-dismiss="modal" id="reset">Reset</button>
        <button type="submit" class="btn btn-success">Save </button>
      </div>
    </form>
    </div>
  </div>
</div>