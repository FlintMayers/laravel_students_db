@extends('layouts.app')

@section('content')
@include('nav')

<div class="container">
    <div class="row">
    		<div class="col-md-12">

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
						<h3 class="panel-title">Redaguoti paskaita</h3>
					</div>
					<div class="panel-body">
						<form action="{{ route('postEditLecture') }}" method="post" enctype="multipart/form-data">
							{{csrf_field()}}
							
							<input type="hidden" name="id" value="{{ $lecture->id }}">	
							<input type="text" name="lecture_date" value = "{{ $lecture->lecture_date }}" class="form-control @if ($errors->has('lecture_date')) btn-danger @endif" placeholder="Paskaitos data" > <br>
							<input type="text" name="name" value = "{{ $lecture->name }}" class="form-control @if ($errors->has('name')) btn-danger @endif" placeholder="Pavadinimas" > <br>		
							<input type="text" name="description" value = "{{ $lecture->description }}" class="form-control @if ($errors->has('aprasas')) btn-danger @endif" placeholder="Aprasas" > <br>	
							
							<label for="groupsList">Pasirinkti grupe: </label>
							<select id="groupsList" class="selectpicker" name="group_id">
						    
						    <option></option>
							  @foreach ($groups as $group)
							  	<option value="{{ $group->id }}" @if($group->id == $lecture->group_id) {{ 'selected'}} @endif>{{ $group->name }}</option>
							  @endforeach
							</select> <br>
							
							<table class="table">
								<tr>
									<th>Pavadinimas</th>
									<th>Matomumas</th>
									<th>Istrinti</th>
								<tr>
							@foreach($lecture -> files as $failas)
								<tr>
									<td>{{ $failas->name }}</td>
									<td>
										<a href="{{ route('makeFileVisible', $failas->id) }}" type="submit" class="btn @if($failas->visibility == 1) {{ 'btn-success'}} @endif">Matomas</a>
										<a href="{{ route('makeFileInvisible', $failas->id) }}" type="submit" class="btn @if($failas->visibility == 0) {{ 'btn-success'}} @endif">Nematomas</a>
									</td>
									<td><a href="{{ route('deleteSpecificFile', $failas->id) }}" type="submit" class="btn btn-danger">Istrinti</a></td>
								</tr>
							@endforeach								
							</table>

							<br>
							<label for="skaidre">Prideti failu prie paskaitos</label>
							<input type="file" id="file" name="skaidre[]">
							
							
							<input type="submit" class="btn btn-lg btn-primary btn-block" value="Redaguoti paskaita">
						</form>
					</div>
				</div>		
			</div>
    </div>
</div>

@endsection