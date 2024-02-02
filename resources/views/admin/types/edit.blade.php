@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
		<h2>Modifica progetto</h2>
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
		<form action="{{ route('admin.type.update', $type->id) }}" method="POST">
			@csrf
            @method('PUT')
			<div class="mb-3">
				<label for="name" class="form-label">name</label>
				<input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old("name") ?? $type->name}}" >
				@error('title')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="description" class="form-label">description</label>
				<input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{old("description") ?? $type->description}}">
				@error('description')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<div class="mb-3">
				<label for="image" class="form-label">image</label>
				<input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{old("image") ?? $type->image}}">
				@error('image')
					<div class="invalid-feedback">{{ $message }}</div>
				@enderror
			</div>
			<button type="submit" class="btn btn-primary">Modifica</button>
            <a href="{{ route('admin.type.index') }}" class="btn btn-primary">annulla</a>

		</form>
	</div>
</div>
@endsection