
@if(count($Types)>0)

@foreach($Types as $Typeses)
<input type="checkbox" name="student_type[{{$Typeses->id}}]" value="{{$Typeses->id}}" class="mr-2"/> {{$Typeses->student_type}}
@endforeach
@else
<span class="text-danger">Please Add Some Type</span>
@endif