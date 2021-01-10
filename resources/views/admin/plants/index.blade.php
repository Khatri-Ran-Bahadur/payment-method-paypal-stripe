@extends('layouts.admin')

@section('content')
	<div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>

            Plant Lists @if(Session::has('message'))
<span class="alert alert-info">{{ Session::get('message') }}</span>
@endif
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>SN</th>
                            <th>Plant</th>
                            <th>Email</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Plant</th>
                            <th>Email</th>
                            <th>Edit/Delete</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach($plants as $key=>$plant)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$plant->plant}}</td>
                            <td>
                            	<p><b>TO</b>: {{$plant->to}}</p>
                            	<p><b>CC</b>: {{$plant->cc}}</p>
                            	<p><b>BCC</b>: {{$plant->bcc}}</p>
                            </td>
                            <td>
                            	<a href="{{route('plants.edit',$plant->id)}}" class="btn btn-info btn-sm">Edit</a>
                            	<form style="display: inline;" method="POST" action="{{ route('plants.destroy',$plant->id) }}">
                        			<button onclick="return confirm('Are you sure?');" class="btn btn-danger btn-sm" type="submit">Delete</button>
			                        @method('DELETE')
			                        {{ csrf_field() }} 
								</form>
                            </td>
                        </tr> 
                        @endforeach
                          <!-- Now We does not use datatable server side  -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script type="text/javascript">
    	function deletePlant(id){
    		const confirmBtn=confirm('Do you want to delete this plant');
    		if(confirmBtn===true){
    			document.getElementById("plant"+id).submit();
    		}
    	}
    </script>
@endsection