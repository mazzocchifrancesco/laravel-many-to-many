@extends('layouts.admin')

@section('content')
<div class="container-fluid mt-4">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">

                {{-- titolo  --}}
				<div class="card-header d-flex justify-content-between">{{ __('Dettaglio') }}
                {{-- contenitore bottoni modifica  --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning me-1"><i class="fa-solid fa-pencil"></i></a>
                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger inline-block">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>

				<div class="card-body">
					<div id="cardBox" class="container">
						<div class="row">
							<div class="col-12" id="card">
								<img class="cardImg" src={{$project->image}} alt="">
								<p class="text-uppercase fw-bold text-center py-3">{{ $project->name }}</p>
								<p class="fw-light">{{ $project->description }}</p>
								<p class="fw-bold">{{ $project->supervisor }}</p>
								<p class=""><strong>data creazione:</strong> {{ $project->creation_date }}</p>
								<p>Tipo: <a href="{{ route('admin.type.show', $project->type->id) }}" class="card-subtitle mb-2 text-muted fw-bolder">{{ $project->type ? $project->type->name : 'senza tipo' }}</a></p>
								@if (count($project->technologies) > 0)
								<ul>
									@foreach ($project->technologies as $technology)
										<li>{{ $technology->name }}</li>
									@endforeach
								</ul>
							@else
								<span>no technology</span>
							@endif
                                

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection