@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						<span>{{ $author->name }}</span>
						<form action="{{ route('author.destroy',$author->id) }}" method="POST" class="float-right">
							@csrf
							@method('DELETE')
							<button class="btn btn-danger">Delete</button>
						</form>
						<a href="{{ route('author.edit',$author->id) }}" class="float-right btn btn-warning mr-2">Edit</a>
					</div>
					<div class="card-body">
						<h5>{{ $author->name }} {{ $author->surname }}</h5>
						<div> <h6 class="text-primary">Books</h6>
							@foreach($author->books as $book)
								<div class="btn btn-outline-primary">
									<a class="p-2 text-dark" href="{{route('book.show',$book->id)}}">{{$book->name}}</a>
									<a class="text-danger"  href="{{route('author.remove.book',[$author->id,$book->id])}}">x</a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
