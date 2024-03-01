@extends('layouts.admin')

@section('content')
<section>
<div class="container-fluid">
  	<!-- Page Header-->
  	<header> 
  		<div class="row">
  			<div class="col-md-6">
    			<h1 class="">{{ __('User Details') }}</h1>
  			</div>
  			<div class="col-md-6 text-right">
  				<a href="{{route('admin.users.index')}}" class="btn btn-blue">
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
						<div class="col-md-4 bg-light">
							<div class="row">
								<div class="col-md-12 text-center">
									<img src="{{asset($user->thumb_image)}}"  width ="130" class="rounded-circle">
								</div>
								<div class="col-md-12 mt-1">	
									<div class="p-3 list-group list-group-flush">
										<div class="row list-group-item d-flex bg-light px-0">
											<h2 class="col-12 text-truncated text-center mb-3">
												{{ ucwords($user->name) }}
											</h2>
										</div>
											
										<div class="row font-custom list-group-item d-flex px-0">
											<div class="col-md-6">
												<b>Email:</b>
											</div>
											<div class="col-md-6 text-right">
												{{ $user->email }}
											</div>
										</div>
									</div>
								</div>

								<div class="accordion col" id="accordionExample">
									<div class="card mb-2">
										<div class="card-header px-0 py-2" id="headingOne">
											<h2 class="mb-0">
												<button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
													Basic Detail
												</button>
											</h2>
										</div>
			
										<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
											<div class="card-body p-0">
												<div class="col-md-12 mt-1">	
													<div class="list-group list-group-flush p-0">			
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>Phone no:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user->profile)
																?
																	$user->profile->phone_no
																:"N/A"
															}}
															</div>
														</div>
					
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>  Address:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user->profile)
																?
																	$user->profile->address
																:"N/A"
															}}
															</div>
														</div>
					
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>   City:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user->profile)
																?
																	$user->profile->city
																:"N/A"
															}}
															</div>
														</div>
					
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>    State:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user->profile)
																?
																	$user->profile->state
																:"N/A"
															}}
															</div>
														</div>
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>    Zip:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user->profile)
																?
																	$user->profile->zip
																:"N/A"
															}}
															</div>
														</div>
														<div class="row font-custom list-group-item d-flex px-0">
															<div class="col-sm-6">
																<b>  Credits:</b>
															</div>
															<div class="col-sm-6 text-right">
															{{ 
																($user)
																?
																	$user->credit
																:"N/A"
															}}
															</div>
														</div>
													</div>		                            
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
						<div class="col-md-8 mt-4">
                            <div class="row">
								<div class="col-md-12">
									<h2>Add Credits</h2>
								</div>
            
								<div class="col-md-10 offset-md-1 py-5">
									<form method="POST" action="{{route('admin.users.update',['user' => $user->id])}}" autocomplete="off" id="packageForm">
										@csrf
										@method('PUT')
										<div class="form-group">
											<label for="PackageName">{{__('Add Credit')}}</label>
											<input type="number" name="credit" class="form-control" id="PackageName" value="{{old('credit')}}" required>
											@error('credit')
												<label class="">{{ $message }}</label>
											@enderror
										</div>

										<div class="form-group text-right">
											<button type="submit" class="btn btn-success">Submit</button>
										</div>
									</form>
								</div>
								
							
								<div class="col-md-10 offset-md-1 ">
									<div class="row">
										@if($user->searchRoom)
											@foreach($user->searchRoom as $searchRoom)
												<div class="col-lg-6 my-3">
													<div class="card shadow-md rounded border p-3 h-100 mb-0">
														<div class="card-body">
															<div class="font-weight-bold text-primary">
																{{ 
																	$searchRoom->implode_room
																	
																}}  
																
																{{ 
																	$searchRoom->implode_capacity == null ?'': "Capacity: ".$searchRoom->implode_capacity
																}} 
																{{ 
																	$searchRoom->implode_care_offered == null ?'':"CaredOffered: ".$searchRoom->implode_care_offered
																}} 
																{{ 
																	$searchRoom->implode_language == null ?'':"Language: ". $searchRoom->implode_language
																}}
															</div>
															<div class="text-sm">
															{{ $searchRoom->min_price }} -  {{ $searchRoom->max_price }}
																<span class="text-muted block">Date:{{ $searchRoom->created_at }}</span>
															</div>
														</div>
													</div>						
												</div>
											@endforeach
										@endif
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
<form method="POST" action="" id="DeletePackageForm">
	@method('DELETE')
	@csrf
	
</form>
@endsection


@push('css')
	<link rel="stylesheet" href="{{ asset('css/common/jquery.datetimepicker.min.css') }}"></link>
	<link rel="stylesheet" href="{{ asset('css/common/jquery.timepicker.min.css') }}"></link>
@endpush

@push('scripts')
    <script src="{{ asset('js/common/jquery-validation/jquery.validate.min.js') }}"></script>

    <script src="{{ asset('js/common/jquery.datetimepicker.full.min.js') }}"></script>
    <script src="{{ asset('js/common/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/document/create.js') }}"></script>
    <script src="{{ asset('js/user_detail.js') }}"></script>
@endpush
