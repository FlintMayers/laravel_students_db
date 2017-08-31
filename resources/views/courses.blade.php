@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">

  <div class="row">
	  <div class="col-md-12 ">

	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>Pavadinimas</th>
	 	  	<th>Redaguoti</th>
	 	  	<th>Istrinti</th>
	 	  </tr>
	 	@foreach($courses as $course)
	 	  <tr>
	 	  	<td>{{ $course->name }}</td>
	 	  	<td><a href="{{ route('editCourse', $course->id) }}" type="submit" class="btn btn-success">Redaguoti</a></td> 	
	 	  	<td><a href="{{ route('deleteCourse', $course->id) }}" type="submit" class="btn btn-default">Istrinti</a></td> 	
	 	   </tr>
	 	 @endforeach
		</table>
		<p>Is viso kursu: {{ $total }}</p>
	  </div>
  </div>

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
					<h3 class="panel-title">Naujo kurso pridejimas</h3>
				</div>
				<div class="panel-body">
					<form action="{{ route('addCourse') }}" method="post">
						{{csrf_field()}}
										
						<input type="text" name="name" value = "{{ Request::old('name') }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>		
						
						<input type="submit" class="btn btn-lg btn-primary btn-block" value="Prideti">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
