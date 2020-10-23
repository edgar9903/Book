@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Book create</div>

					<div class="card-body">
						<form action="{{ route('book.store') }}" method="post">
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
							<div class="form-group row authors">
								<label for="author" class="col-md-3 col-form-label text-md-right">Author</label>
								<div class="col-md-7 contents">
									<input type="hidden" name="authors[]" class="authors_id" value="0">
									<input type="text" class="form-control author_book {{$errors->any('authors')?'is-invalid':''}}" required autofocus>
									@if($errors->any('authors'))
										<span class="invalid-feedback" role="alert">
											<strong>{{ implode('', $errors->all(':message')) }}</strong>
										</span>
									@endif

								</div>
							</div>
							<div class="form-group row mb-0 footer">
								<div class="col-md-8 offset-md-3">
									<button type="button" id="add_author" class="btn btn-primary">
										Add Author
									</button>
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
