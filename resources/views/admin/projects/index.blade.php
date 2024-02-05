@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Index') }}</div>

				<div class="card-body">
					<div id="cardBox" class="container">
						<div class="row">
						@foreach ($data as $progetto)
							<div class="col-4 mb-4 rounded d-flex flex-column align-items-center" id="card">
								<img class="cardImg rounded" src={{$progetto->image}} alt="">
								<p class="text-uppercase fw-bold text-center my-2">{{ $progetto->name }}</p>
								<p class="fw-bold">{{ $progetto->supervisor }}</p>
                                <a href="{{ route('admin.type.show', $progetto->type ? $progetto->type->id : '') }}" class="card-subtitle mb-2 text-muted fw-bolder">{{ $progetto->type ? $progetto->type->name : 'senza tipo' }}</a>
								@if (count($progetto->technologies) > 0)
								<ul>
									@foreach ($progetto->technologies as $technology)
										<li>{{ $technology->name }}</li>
									@endforeach
								</ul>
							@else
								<span>no technology</span>
							@endif
								<a href="{{ route('admin.projects.show', $progetto->id) }}" class="btn btn-primary my-3">Dettagli</a>
							</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection