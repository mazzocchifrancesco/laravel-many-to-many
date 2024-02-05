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
			{{-- aggiunta type  --}}
			<div class="mb-3">
				<label for="type_id" class="form-label">seleziona un tipo</label>
				<select name="type_id" id="type_id" class="form-select">
					<option selected value="">seleziona una tipo</option>
					@foreach ($types as $type)
						<option value="{{ $type->id }}">{{ $type->name }}</option>
					@endforeach
				</select>
			</div>

			{{-- aggiunta tech  --}}
			<div class="mb-3">
				<label for="tags" class="form-label">seleziona le tech</label>
				<select multiple name="technologies[]" id="technologies" class="form-select">
					<option selected value="">seleziona almeno una tech</option>
					@foreach ($technologies as $technology)
						<option value="{{ $technology->id }}">{{ $technology->name }}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">Inserisci</button>
		</form>
	</div>
</div>
@endsection