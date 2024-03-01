@extends('layouts.admin')

@section('content')
<section>
<div class="container-fluid">
  	<!-- Page Header-->
  	<header> 
  		<div class="row">
  			<div class="col-md-6">
    			<h1 class="">{{ __('Book Details') }}</h1>
  			</div>
  			<div class="col-md-6 text-right">
  				<a href="{{route('admin.books.index')}}" class="btn btn-blue">
  					Back
  				</a>
  			</div>
  		</div>
    	@if (session('status'))
		    <div class="alert alert-warning alert-dismissible fade show" role="alert">
		        {{ session('status') }}
		        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
			  	</button>
		    </div>
		@endif
		<x-alert/>	
  	</header>
  	<div class="row" id='app'>
    	<div class="col">
			<div class="card">
				<div class="card-body p-0">
					<div class="row">
						<div class="col-md-12 mt-1">	
							<div class="p-3 list-group list-group-flush">
								<div class="row list-group-item d-flex bg-light px-0">
									<h2 class="col-12 text-truncated text-center mb-3">
										{{ ucwords($book->title) }}
									</h2>
								</div>
									
								<div class="row font-custom list-group-item d-flex px-0">
									<div class="col-md-6">
										<b>Author:</b>
									</div>
									<div class="col-md-6 text-right">
										{{ $book->author }}
									</div>
								</div>
								<div class="row font-custom list-group-item d-flex px-0">
									<div class="col-md-6">
										<b>Genre:</b>
									</div>
									<div class="col-md-6 text-right">
										{{ $book->genre_name }}
									</div>
								</div>
								<div class="row font-custom list-group-item d-flex px-0">
									<div class="col-md-6">
										<b>Quantity:</b>
									</div>
									<div class="col-md-6 text-right">
										{{ $book->quantity }}
									</div>
								</div>
								<div class="row font-custom list-group-item d-flex px-0">
									<div class="col-md-6">
										<b>Price:</b>
									</div>
									<div class="col-md-6 text-right">
										{{ $book->price }}
									</div>
								</div>
							</div>
						</div>

							
						
						
                	</div>
					<!--/row-->
                </div>
                <!--/card-block-->
            </div>
        </div>
  	</div>
</div>
</section>

@endsection



