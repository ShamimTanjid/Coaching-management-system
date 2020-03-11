          @if(count($studentTypes)>0)
                        @php($i=1)
                        @foreach($studentTypes as $studentTypess)
                       <tr>
                        <td>{{$i++}}</td>
                        <td>{{$studentTypess->classname}}</td>
                         <td>{{$studentTypess->student_type}}</td>                 
                        <td>
                            @if($studentTypess->status == 1)
                            <button onclick="studenttypeunpublished('{{$studentTypess->id}}')"  title="Unpublished" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up"></a></button>
                            @else
                            <button onclick="studenttypepublished('{{$studentTypess->id}}')" title="published" class="btn btn-sm btn-warning fa fa-arrow-alt-circle-down"></button>
                            @endif
                            <button onclick="studenttypedite('{{$studentTypess->id}}','{{$studentTypess->student_type}}')"  class="btn btn-sm btn-info fa fa-edit" title="Edite"></button>
                            <button onclick="studenttypeDelete('{{$studentTypess->id}}')" class="btn btn-sm btn-danger fa fa-trash-alt" ></button>
                            
                        </td>
                    </tr>
                   @endforeach()
                   @else
                    <tr class="text-danger">
                        <td colspan="5">Student Type Not Founded!!!</td>
                    </tr>
                   @endif
    <script type="text/javascript">

    </script>