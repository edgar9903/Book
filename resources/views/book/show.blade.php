@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<span>{{ $book->name }}</span>
						<form action="{{ route('book.destroy',$book->id) }}" method="POST" class="float-right">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger">Delete</button>
						</form>
						<a href="{{ route('book.edit',$book->id) }}" class="float-right btn btn-warning mr-2">Edit</a>
					</div>
					<div class="card-body">
						<h5>{{ $book->name }}</h5>
						<div> <h6 class="text-primary">Authors</h6>
							@foreach($book->authors as $author)
								<div class="btn btn-outline-primary">
									<a class="p-2 " href="{{route('author.show',$author->id)}}">{{$author->name}} {{ $author->surname }}</a>
									<a href="{{route('book.remove.author',[$book->id,$author->id])}}">x</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
