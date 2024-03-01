@extends('layouts.admin')

@section('content')
  	<section>
        <div class="container-fluid">
          	<!-- Page Header-->
          	<header> 
          		<div class="row">
          			<div class="col-md-6">
            			<h2>Edit Book</h2>
          			</div>
          		</div>
          		<!-- alert message component -->
            	<x-alert/>			
          	</header>
          	<div class="row">
            	<div class="col-md-12">
              		<div class="card">
		                <div class="card-body">
                            <form method="POST" action="{{route('admin.books.update',['book' => $book->id])}}" autocomplete="off" id="packageForm">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ old('name', $book->title) }}" required>
                                    @error('name')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="author">{{__('Author')}}</label>
                                    <input type="text" name="author" class="form-control" id="author" value="{{old('author', $book->author)}}" required>
                                    @error('name')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Genre">{{__('Genre')}}</label>
                                    <select name="genre" class="form-control" value="{{old('genre', $book->genre)}}" required>
                                        <option value="">Select Genre</option>
                                        <option value="0" {{ $book->genre == 0 ? 'selected' : ''}}>Fiction</option>
                                        <option value="1" {{ $book->genre == 1 ? 'selected' : ''}}>Non-Fiction</option>
                                        <option value="2" {{ $book->genre == 2 ? 'selected' : ''}}>Science Fiction</option>
                                        <option value="3" {{ $book->genre == 3 ? 'selected' : ''}}>Others</option>
                                    </select>
                                    @error('genre')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">{{__('Price')}}</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{old('price',$book->price)}}" required>
                                    @error('price')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Quantity">{{__('Quantity')}}</label>
                                    <input type="number" name="quantity" class="form-control" id="Quantity" value="{{old('quantity',$book->quantity)}}" required>
                                    @error('quantity')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                
                                <div class="form-group text-right">
                                    <a href="{{route('admin.books.index')}}" class="btn btn-default">Cancel</a>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
		                </div>
	              	</div>
	            </div>
          	</div>
        </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/admin/package/create.js') }}"></script>
@endpush

