@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			@foreach($authors as $author)
				<div class="col-md-4 p-2">
					<div class="border p-3">
						<a href="{{ route('author.show',$author->id)}}">
							<h5>{{ $author->name }} {{ $author->surname }}</h5>
						</a>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endsection
