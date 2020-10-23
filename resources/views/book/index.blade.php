@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($books as $book)
				<div class="col-md-4 p-2">
					<div class="border p-3">
						<a href="{{ route('book.show',$book->id)}}">
							<h5 class="text-center">{{ $book->name }}</h5>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
