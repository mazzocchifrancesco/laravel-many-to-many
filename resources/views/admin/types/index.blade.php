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
						@foreach ($data as $type)
							<div class="col-4 mb-4 rounded p-2 d-flex flex-column align-items-center" id="card">
								<div class="imgBoxIndex rounded">
									<img class="cardImg rounded" src={{$type->image}} alt="">
								</div>
								<p class="text-uppercase fw-bold text-center my-2">{{ $type->name }}</p>
                                <a href="{{ route('admin.type.show', $type->id) }}" class="btn btn-primary">Dettagli</a>
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