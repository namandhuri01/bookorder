@extends('layouts.admin')

@section('content')
  	<section>
        <div class="container-fluid">
          	<!-- Page Header-->
          	<header> 
          		<div class="row">
          			<div class="col-md-6">
            			<h2>Add New Book</h2>
          			</div>
          		</div>
          		<!-- alert message component -->
            	<x-alert/>			
          	</header>
          	<div class="row">
            	<div class="col-md-12">
              		<div class="card">
		                <div class="card-body">
                        
                            <form method="POST" action="{{route('admin.books.store')}}" autocomplete="off" id="packageForm">
                                @csrf
                                <div class="form-group">
                                    <label for="title">{{__('Title')}}</label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{old('title')}}" required>
                                    @error('name')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="author">{{__('Author')}}</label>
                                    <input type="text" name="author" class="form-control" id="author" value="{{old('author')}}" required>
                                    @error('name')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Genre">{{__('Genre')}}</label>
                                    <select name="genre" class="form-control" value="{{old('genre')}}" required>
                                        <option value="">Select Genre</option>
                                        <option value="0">Fiction</option>
                                        <option value="1">Non-Fiction</option>
                                        <option value="2">Science Fiction</option>
                                        <option value="3">Others</option>
                                    </select>
                                    @error('genre')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="price">{{__('Price')}}</label>
                                    <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}" required>
                                    @error('price')
	                                    <label class="">{{ $message }}</label>
	                                @enderror
                                </div>
                                <div class="form-group">
                                    <label for="Quantity">{{__('Quantity')}}</label>
                                    <input type="number" name="quantity" class="form-control" id="Quantity" value="{{old('quantity')}}" required>
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
    <script type="text/javascript" src="{{ asset('js/admin/books/create.js') }}"></script>
@endpush

