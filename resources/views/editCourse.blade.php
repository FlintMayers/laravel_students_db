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
						<h3 class="panel-title">Redaguoti kursa</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('postEditedCourse') }}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{ $course->id }}">							
							
							<input type="text" name="name" value = "{{ $course->name }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>	
							
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