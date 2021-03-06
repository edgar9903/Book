@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Author create</div>

					<div class="card-body">
						<form action="{{ route('author.store') }}" method="post">
							@csrf
							<div class="form-group row">
								<label for="name" class="col-md-3 col-form-label text-md-right">Name</label>

								<div class="col-md-7">
									<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
									@error('name')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>
							<div class="form-group row">
								<label for="surname" class="col-md-3 col-form-label text-md-right">Surname</label>

								<div class="col-md-7">
									<input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autofocus>
									@error('surname')
									<span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
									@enderror
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-8 offset-md-3">
									<button type="submit" class="btn btn-primary">
										Submit
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
