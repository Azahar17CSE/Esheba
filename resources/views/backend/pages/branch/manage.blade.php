@extends('backend.layout.templete')

@section('body')
	<div class="br-pagetitle">
		<i class="icon ion-ios-home-outline"></i>
		<div>
		  <h4>Manage All Branch</h4>
		  <p class="mg-b-0">Do bigger things with Bracket plus, the responsive bootstrap 4 admin template.</p>
		</div>
	</div>
	<div class="br-pagebody">
		<div class="row">
			<div class="col-lg-12">

				<!-- page body content start here -->
				<div class="card bd-0 shadow-base">

					@include('backend.flash-message')

			      <div class="d-md-flex justify-content-between pd-25">
			        
			        
			      <!-- Table content start -->
			      	<section class="container">
						<div class="row">
							<div class="col-md-12">
								<h2 class="alert alert-success col-md-12 text-center">All Branches Information</h2>
								<!-- Table start-->
								<table class="table table-striped table-bordered table-hover table-custom">
									<thead class="table-light">
									<tr>
									  <th scope="col">#SL</th>
									  <th scope="col">Branch Name</th>
									  <th scope="col">Bangla_Name</th>
									  <th scope="col">Address Line1</th>
									  <th scope="col">Address Line2</th>
									  <th scope="col">Phone</th>
									  <th scope="col">Status</th>
									  <th scope="col">Action</th>
									</tr>
									</thead>


									<tbody>
										@php 

											$i = 0; 

										@endphp
										@foreach ($branches as $branch)

										@php 

											$i++; 

										@endphp
										<tr>
											<th scope ='row'>{{ $i }}</th>
											<td>{{ $branch->name }}</td>
											<td>{{ $branch->bangla_name }}</td>
											<td>{{ $branch->address_line1 }}</td>
											<td>{{ $branch->address_line2 }}</td>
											<td>{{ $branch->phone }}</td>
											<td>
												@if( $branch->status == 1)
													<span class="badge badge-success">Active</span>
												@elseif($branch->status == 2)
													<span class="badge badge-danger">Inactive</span>
												@endif
											</td>
											<td>
												<ul class="custom-action">
													<li>
														<a href="{{ route('branch.edit', $branch->id) }}">
															<i class="fa fa-edit"></i>
														</a>
													</li>
													<li>
														<a href="" data-toggle="modal" data-target="#branch{{ $branch->id }}">
															<i class="fa fa-trash"></i>
														</a>
													</li>
												</ul>
											</td>
											<!-- Delete Modal start -->
											<!-- Modal -->
												<div class="modal fade" id="branch{{ $branch->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
												  <div class="modal-dialog">
												    <div class="modal-content">
												      <div class="modal-header">
												        <h5 class="modal-title" id="exampleModalLabel">Do You Confirm To Delete This Branch</h5>
												        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
												          <span aria-hidden="true">&times;</span>
												        </button>
												      </div>
												      <div class="modal-body">
												        <div class="modal-button">
												        	<ul>
												        		<li>
												        			<form action="{{ route('branch.destroy', $branch->id ) }}" method="POST">
												        			@csrf
												        				<button type="submit" class="btn btn-danger">Confirm</button>
												        			</form>
												        			
												        		</li>
												        		<li>
												        			<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
												        		</li>
												        	</ul>
												        </div>
												      </div>
												      <div class="modal-footer">
												        
												        <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close">Close</button>
												      </div>
												    </div>
												  </div>
												</div>
											<!-- Delete Modal end -->
										</tr>
										@endforeach
									</tbody>
								</table>


								@if( $branches->count() == 0)

									<div class="alert alert-info">
										No Branch Added.Please Add new Branch
									</div>

								@endif
								<!--Table end -->
							<a href="{{ route('branch.create') }}" class="btn btn-teal mg-b-10">Add New Branch</a>
								
							</div>
						</div>
					</section>
			      <!-- Table content End -->

			      <div class="pd-l-25 pd-r-15 pd-b-25">
			        <div id="ch5" class="ht-250 ht-sm-300"></div>
			      </div>
			    </div><!-- card -->
			    <!-- page body content end here -->
			</div>
		</div>
	</div>
@endsection