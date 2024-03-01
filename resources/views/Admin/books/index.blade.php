@extends('layouts.admin')

@section('content')
  	<section>
        <div class="container-fluid">
          	<!-- Page Header-->
          	<header> 
          		<div class="row">
          			<div class="col-6">
            			<h2 class="h3 display">{{__('Books')}}</h2>
          			</div>
					<div class="col-6 text-right">
          				<a href="{{route('admin.books.create')}}" class="btn btn-primary1">
						    Add Book
					  	</a>
          			</div>
          			
          		</div>
          		<!-- alert message component -->
            	<x-alert/>	
          	</header>
          	<div class="row">
            	<div class="col">
              		<div class="card">
		                <div class="card-body">
							<div class="row justify-content-end pb-3">
								<div class="col-auto">
									<select id="pagination" class="form-control">
										<option value="15" @if($items == 15) selected @endif>15</option>
										<option value="50" @if($items == 50) selected @endif>50</option>
										<option value="100" @if($items == 100) selected @endif>100</option>
										<option value="250" @if($items == 250) selected @endif>250</option>
										<option value="500" @if($items == 500) selected @endif>500</option>
										<option value="1000" @if($items == 1000) selected @endif>1000</option>
									</select>
								</div>
							</div>
		                  	<div class="table-responsive">
		                    	<table class="table">
			                      	<thead>
				                        <tr>
				                          	<th>#</th>
				                          	<th>
				                          		{{__('Title')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Author')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Genre')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Price')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Stock')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Status')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Created At')}}
				                          	</th>
											<th>
												{{__('Action')}}
											</th>
											  
				                        </tr>
			                      	</thead>
			                      	<tbody>
			                      		@if (count($books))
										    @foreach ($books as $book)								        
						                        <tr>
						                          	<th scope="row">{{$loop->index+1}}</th>
						                          	<td>{{ $book->title?? 'N/A' }}</td>
						                          	<td>{{ $book->author }}</td>
						                          	<td>{{ $book->genre_name }}</td>
						                          	<td>{{ $book->price }}</td>
						                          	<td>{{ $book->quantity }}</td>
						                          	<td>{{ $book->status }}</td>
													<td>
						                          		{{ 
						                          			(!empty($book->created_at))
						                          			? $book->created_at
						                          			:'N/A'
						                          		}}
						                          	</td>
													<td class="d-flex">
															<form action="{{ route('admin.books.destroy',['book' => $book->id ]) }}" method="POST">
															  	{{ csrf_field() }}
															  	{{ method_field('DELETE') }} 
							                          			<a href="#">
							                          				<i class="fa fa-trash" data-message="deactivate">
																		Delete
							                          				</i>
							                          			</a>
															</form>
														
														<a class="ml-3" href="{{ route('admin.books.show', [ 'book'=> $book->id ]) }}" >
					                          				<i class="fa fa-eye"></i> View
					                          			</a>
														<a class="ml-3" href="{{ route('admin.books.edit', ['book' => $book->id]) }}">
						                          			<i class="fa fa-edit"></i>Edit
														</a>
						                          	</td>
						                        </tr>
										    @endforeach
										@else
										    <tr> <td colspan=4> {{__('No Record Found.') }}</td></tr>
										@endif
			                      		
			                      	</tbody>
			                    </table>
			                    <div class="text-right">
			                    	{!! $books->appends(\Request::except('page'))->render() !!}
			                    </div>
		                  	</div>
		                </div>
	              	</div>
	            </div>
          	</div>
        </div>
  	</section>
@endsection

@push('scripts')
	<script type="text/javascript">
		$('.fa-trash, .fa-undo').on('click', function(e){
			let msg = $(this).attr('data-message');
			let form = $(this).closest('form');
			if(confirm(`Are you sure want to ${msg} the book`)) {
				form.submit();
			}
		});
	</script>
	<script>
		document.getElementById('pagination').onchange = function() {
			window.location = "{{ $books->url(1) }}&items=" + this.value;
		}

	</script>
@endpush;