@extends('layouts.admin')

@section('content')
  	<section>
        <div class="container-fluid">
          	<!-- Page Header-->
          	<header> 
          		<div class="row">
          			<div class="col-md-8">
            			<h2 class="h3 display">{{__(strtoupper('Dashboard'))}}</h2>
          			</div>
          			<div class="col-md-4 text-right">
          			</div>
          		</div>
          		<!-- alert message component -->
            	<x-alert/>	
          	</header>
			  <div class="row">
            	<div class="col">
              		<div class="card">
		                <div class="card-body">
		                  	<div class="table-responsive">
		                    	<table class="table">
			                      	<thead>
				                        <tr>
				                          	<th>#</th>
				                          	<th>
				                          		Item Name
				                          	</th>
				                          	<th>				                          		
			                          			Count
				                          	</th>
				                        </tr>
			                      	</thead>
			                      	<tbody>
			                      										        
									<tr>
										<th scope="row">1</th>
										<td><a href="{{route('admin.users.index')}}"> Total Users</a></td>
										<td>{{ $usersCount}} </td>
									</tr>
									<tr>
										<th scope="row">2</th>
										<td><a href="{{route('admin.books.index')}}"> Total Books</a></td>
										<td>{{ $booksCount}} </td>
									</tr>
									
									
			                      		
			                      	</tbody>
			                    </table>
		                  	</div>
		                </div>
	              	</div>
	            </div>
          	</div>
        </div>
  	</section>
@endsection
