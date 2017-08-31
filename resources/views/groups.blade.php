@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">

  <div class="row">
	  <div class="col-md-12 ">

	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>ID</th>
	 	  	<th>Grupe</th>
	 	  	<th>Kursas</th>
	 	  	<th>Prasideda</th>
	 	  	<th>Baigiasi</th>
	 	  	<th>Valdymas</th>
	 	  	<th>Redaguoti</th>
	 	 	<th>Istrinti</th>
	 	  </tr>
	 	@foreach($groups as $group)
	 	  <tr>
	 	  	<td>{{ $group->id }}</td>
	 	  	<td>{{ $group->name }}</td>
	 	  	<td>{{ $group->course->name }}</td>
	 	  	<td>{{ $group->start_date }}</td>
	 	  	<td>{{ $group->end_date }}</td>
<!-- 	 	more than one parameter has to be inside of array  -->
	 	  	<td><a href="{{ route('manageStudents', [$group->id, $group->course_id]) }}" type="submit" class="btn btn-info">Valdyti grupe</a></td>
			<td><a href="{{ route('editGroup', $group->id) }}" type="submit" class="btn btn-success">Redaguoti</a></td> 	
	 	  	<td><a href="{{ route('deleteGroup', $group->id) }}" type="submit" class="btn btn-default">Istrinti</a></td> 	
	 	   </tr>
	 	 @endforeach
		</table>
		<p>Is viso grupiu: {{ $total }}</p>
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
					<h3 class="panel-title">Naujos grupes pridejimas</h3>
				</div>
				<div class="panel-body">
					<form action="{{ route('addGroup') }}" method="post">
						{{csrf_field()}}
						
						<input type="text" name="name" value = "{{ Request::old('name') }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>	
						
						<label for="coursesList">Pasirinkti kursa: </label>
						<select id="coursesList" class="selectpicker" name="course_id">
						    <option></option>
						  @foreach ($courses as $course)
						  	<option value="{{ $course->id }}">{{ $course->name }}</option>
						  @endforeach
						</select> 
						
						<input type="text" name="start_date" value = "{{ Request::old('start_date') }}" class="form-control @if ($errors->has('start_date')) btn-danger @endif" placeholder="Kurso pradzia" > <br>			
						<input type="text" name="end_date" value = "{{ Request::old('end_date') }}" class="form-control @if ($errors->has('end_date')) btn-danger @endif" placeholder="Kurso pabaiga" > <br>
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Prideti">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
