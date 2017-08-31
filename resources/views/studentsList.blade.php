@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">

  <div class="row">
	  <div class="col-md-12 ">
		<h1 class="text-center"> {{$group->name}} grupes  studentai priklausantys {{$course->name}}  kursui</h1>
	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>Vardas</th>
	 	  	<th>Pavarde</th>
	 	  	<th>El. Pastas</th>
	 	  	<th>Telefonas</th>
	 	  	<th>Adresas</th>
	 	  	<th>Miestas</th>
<!-- 	 	  	<th>Redaguoti</th> -->
	 	 	<th>Pasalinti</th>
	 	  </tr>
	 	@foreach($enrolledStudents as $student)
	 	  <tr>
	 	  	<td>{{ $student->name }}</td>
	 	  	<td>{{ $student->surname }}</td>
	 	  	<td>{{ $student->email }}</td>
	 	  	<td>{{ $student->phone }}</td>
	 	  	<td>{{ $student->address }}</td>
	 	  	<td>{{ $student->city }}</td>
<!-- 			<td><a href="" type="submit" class="btn btn-success">Redaguoti</a></td> 	 -->
	 	  	<td><a href="{{ route('deleteEnrolledStudent', [$group->id, $student->id]) }}" type="submit" class="btn btn-danger">Pasalinti</a></td> 	
	 	   </tr>
	 	 @endforeach
		</table>
	  </div>
  </div>
  <br>
	
  <div class="row">
		<div class="col-md-6 col-md-offset-3">

				<div class="panel panel-info">
					<div class="panel-heading">
						<h3 class="panel-title">Priskirti nauja studenta i sia grupe</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('addStudentToCourse') }}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="group_id" value="{{ $group->id }}">		
							<select class="selectpicker" name="student_id">
							  @foreach ($allStudents as $student)
							  	<option value="{{ $student->id }}">{{ $student->name }} {{ $student->surname }}</option>
							  @endforeach
							</select> 
							<input type="submit" class="btn btn-primary btn-block" value="Prideti">
						</form>
					</div>
				</div>
				
				
			</div>
			
	</div>
	
  <div class="row">
	  <div class="col-md-12 ">
		<h1 class="text-center"> {{$group->name}} grupes  studentu paskaitu medziaga</h1>
	  	<table class="table table-hover">
	 	  <tr class="info">
	 	  	<th>Data</th>
	 	  	<th>Pavadinimas</th>
	 	  	<th>Aprasas</th>
	 	  	<th>Failai</th>
	 	  </tr>
	 	@foreach($group->lectures as $lecture)
	 	  <tr>
	 	  	<td>{{ $lecture->lecture_date }}</td>
	 	  	<td>{{ $lecture->name }}</td>
	 	  	<td>{{ $lecture->description }}</td>
	 	  	<td>
	 	  	@foreach($lecture->files as $failas)
	 	  		@if($failas->visibility == 1)
	 	  			<a href="{{asset('/storage/' . $failas->name)}}">Failas</a><br>
	 	  		@endif
	 	  	@endforeach
	 	  	</td>
	 	   </tr>
	 	 @endforeach
		</table>
	  </div>
  </div>
  
  <div class="row">
		<div class="col-md-8 col-md-offset-2">
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
						<h3 class="panel-title">Siusti masini laiska visai grupei</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('sendEmail') }}" method="post">
							{{csrf_field()}}
							<input type="hidden" name="group_id" value="{{ $group->id }}">		
							<input class="form-control input-lg" type="text" name="title" placeholder="Tema">
							<br>
							<textarea class="form-control input-lg" name="body" placeholder="content"></textarea>
							<input type="submit" class="btn btn-success btn-block" value="Siusti laiska">
						</form>
					</div>
				</div>
				
				
			</div>
			
	</div>
</div>

@endsection