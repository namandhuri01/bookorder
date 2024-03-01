@extends('layouts.admin')

@section('content')
  	<section>
        <div class="container-fluid">
          	<!-- Page Header-->
          	<header> 
          		<div class="row">
          			<div class="col-md-8">
            			<h2 class="h3 display">{{__('Users')}}</h2>
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
				                          		{{__('Name')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Email')}}
				                          	</th>
				                          	<th>				                          		
												  {{__('Created At')}}
				                          	</th>
											  
				                        </tr>
			                      	</thead>
			                      	<tbody>
			                      		@if (count($users))
										    @foreach ($users as $user)								        
						                        <tr>
						                          	<th scope="row">{{$loop->index+1}}</th>
						                          	<td>{{ $user->name?? 'N/A' }}</td>
						                          	<td>{{ $user->email }}</td>
													<td>
						                          		{{ 
						                          			(!empty($user->created_at))
						                          			? $user->created_at
						                          			:'N/A'
						                          		}}
						                          	</td>
						                        </tr>
										    @endforeach
										@else
										    <tr> <td colspan=4> {{__('No Record Found.') }}</td></tr>
										@endif
			                      		
			                      	</tbody>
			                    </table>
			                    <div class="text-right">
			                    	{!! $users->appends(\Request::except('page'))->render() !!}
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
			if(confirm(`Are you sure want to ${msg} the user`)) {
				form.submit();
			}
		});
	</script>
	<script>
		document.getElementById('pagination').onchange = function() {
			window.location = "{{ $users->url(1) }}&items=" + this.value;
		}

	</script>
@endpush;