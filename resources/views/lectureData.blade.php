@extends('layouts.app')

@section('content')

@include('nav')

<div class="container">
  <div class="row">
	  <div class="col-md-12 ">

	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>Grupe</th>
	 	  	<th>Data</th>
	 	  	<th>Pavadinimas</th>
	 	  	<th>Aprasas</th>
	 	  	<th>Failai</th>
	 	  	<th>Redaguoti</th>
	 	 	<th>Istrinti</th>
	 	  </tr>
	 	@foreach($lectures as $lecture)
	 	  <tr>
	 	  	<td>{{ $lecture->group->name }}</td>
	 	  	<td>{{ $lecture->lecture_date }}</td>
	 	  	<td>{{ $lecture->name }}</td>
	 	  	<td>{{ $lecture->description }}</td>
	 	  	<td>
	 	  	@foreach($lecture->files as $failas)
	 	  		<a href="{{asset('/storage/' . $failas->name)}}">Failas</a><br>
	 	  	@endforeach
	 	  	</td>
			<td><a href="{{ route('editLecture', $lecture->id) }}" type="submit" class="btn btn-success">Redaguoti</a></td> 	
	 	  	<td><a href="{{ route('deleteLecture', $lecture->id) }}" type="submit" class="btn btn-default">Istrinti</a></td> 	
	 	   </tr>
	 	 @endforeach
		</table>
	  </div>
  </div>
  <br>
	@if (count($errors) > 0)
	<!--   	klaidos -->
    <div class="row">
	  	<div class="alert alert-danger">
			<ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		</div>
	</div>
	@endif

    <div class="row">
    		<div class="col-md-8 col-md-offset-2">

				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Naujos paskaitos pridejimas</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('addLecture') }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							
							<input type="text" name="lecture_date" value = "{{ Request::old('lecture_date') }}" class="form-control @if ($errors->has('lecture_date')) btn-danger @endif" placeholder="Paskaitos data" > <br>
							<input type="text" name="name" value = "{{ Request::old('name') }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>		
							<input type="text" name="description" value = "{{ Request::old('description') }}" class="form-control @if ($errors->has('aprasas')) btn-danger @endif" placeholder="Aprasas" > <br>	
							

						<label for="groupsList">Pasirinkti grupe: </label>
							<select id="groupsList" class="selectpicker" name="group_id">
						    
						    <option></option>
							  @foreach ($groups as $group)
							  	<option value="{{ $group->id }}">{{ $group->name }}</option>
							  @endforeach
							</select> <br>
														
							<label for="fileUpload">Paskaitos failai</label>
							<input type="file" name="skaidre[]">
							<input type="file" name="skaidre[]">
							<input type="file" name="skaidre[]">
							
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="Prideti">
						</form>
					</div>
				</div>		
			</div>
    </div>
</div>
@endsection