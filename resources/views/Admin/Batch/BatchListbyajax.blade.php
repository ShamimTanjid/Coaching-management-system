<thead>
	<tr>
		<th>Sl.</th>
		<th>Batch Name</th>
		<th>Capacity</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	@php($i=1)
	@foreach($batchess as $batchessajax)
	<tr> 
		<td>{{$i++}}</td>
		<td>{{$batchessajax->batchname}}</td>
		<td>{{$batchessajax->studentcapacity}}</td>

		      <td>
           @if($batchessajax->status == 1)
           <button href="" onclick='unpublished("{{$batchessajax->id}}","{{$batchessajax->class_id}}")'id="unpublishedd" title="Unpublished" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up"></button>
           @else
          <button  href="" onclick='published("{{$batchessajax->id}}","{{$batchessajax->class_id}}")' title="published" class="btn btn-sm btn-warning fa fa-arrow-alt-circle-down"></button>
            @endif
             <a href="{{route('batch-eidte',$batchessajax->id)}}"  class="btn btn-sm btn-info fa fa-edit" title="Edite" target="_blank"></a>
             <button href="" onclick='Dlete("{{$batchessajax->id}}","{{$batchessajax->class_id}}")' class="btn btn-sm btn-danger fa fa-trash-alt" onclick="return confirm('If you want to delete this item press ok')"></button>
                          
          </td>
	</tr>
   @endforeach
</tbody>
<script type="text/javascript">
	function unpublished(batchId,classId){
		var check=confirm('If you want to unpublished this Item,Press ok');
		if(check){
			$.get("{{ route('batch-unpublished')}}",{batch_id:batchId,class_id:classId}, function(data){
    		 $("#batchlist").html(data); 
    		})
		}
	}
  function published(batchId,classId){
  	 var check=confirm('If you want to published this Item,Press ok');
		if(check){
			$.get("{{ route('batch-published')}}",{batch_id:batchId,class_id:classId}, function(data){
    		 $("#batchlist").html(data); 
    		})
		}
  }
  function Dlete(batchId,classId){
  	 var check=confirm('If you want to delete this Item,Press ok');
		if(check){
			$.get("{{ route('batch-Dltee')}}",{batch_id:batchId,class_id:classId}, function(data){
    		 $("#batchlist").html(data); 
    		})
		}
  }
</script>