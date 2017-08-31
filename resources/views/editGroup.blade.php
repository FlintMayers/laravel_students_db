@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">
 
 <div class="row">
		<div class="col-md-6 col-md-offset-3">

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

				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Redaguoti grupe</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('postEditedGroup') }}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{ $groups->id }}">							
							
							<input type="text" name="name" value = "{{ $groups->name }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>	
							
							<label for="coursesList">Pasirinkti kursa: </label>
							<select id="coursesList" class="selectpicker" name="course_id">
							    <option></option>
							  @foreach ($courses as $course)
							  	<option value="{{ $course->id }}" @if($course->id == $groups->course_id) {{ 'selected'}} @endif >{{ $course->name }}</option>
							  @endforeach
							</select> 
							
							<input type="text" name="start_date" value = "{{ $groups->start_date }}" class="form-control @if ($errors->has('start_date')) btn-danger @endif" placeholder="Kurso pradzia" > <br>			
							<input type="text" name="end_date" value = "{{ $groups->end_date }}" class="form-control @if ($errors->has('end_date')) btn-danger @endif" placeholder="Kurso pabaiga" > <br>
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="Atnaujinti">
						</form>
					</div>
				</div>
				
				
			</div>
			
			
			
			<div class="col-md-4">

				
				
				
		</div>
	</div>
</div>

@endsection