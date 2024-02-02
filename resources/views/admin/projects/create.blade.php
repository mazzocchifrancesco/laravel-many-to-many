@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<h2>Nuovo progetto</h2>
		@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
	</div>
	<div class="row">
		<form action="{{ route('admin.projects.store') }}" method="POST">
			@csrf
			<div class="mb-3">
				<label for="name" class="form-label">name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old("name")}}" >
				@error('title')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">description</label>
				<input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{old("description")}}">
				@error('description')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">image</label>
				<input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old("image")}}">
				@error('image')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="creation_date" class="form-label">creation_date</label>
				<input type="date" class="form-control @error('creation_date') is-invalid @enderror" id="creation_date" name="creation_date" value="{{old("creation_date")}}">
				@error('creation_date')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="supervisor" class="form-label">supervisor</label>
				<input type="text" class="form-control @error('supervisor') is-invalid @enderror" id="supervisor" name="supervisor" value="{{old("supervisor")}}">
				@error('supervisor')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-primary">Inserisci</button>
		</form>
	</div>
</div>
@endsection