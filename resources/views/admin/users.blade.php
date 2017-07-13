@extends('layouts.admin')

@section('content')
		
	<main id="main-container">
		<div class="content content-boxed">
			<div class="row">
				<div class="col-xs-12">
					<input type="text" readonly="" value="{{ session('type') ?: 'Users' }}" class="form-control">
				</div>
				<div class="col-md-12">
					<a href="{{ route('mail.all') }}" class="btn btn-primary btn-block"> Mail ALL {{ session('users')->count() }}</a>
					<table class="table table-striped">
						<thead>
							<th>S/N</th>
							<th>ID</th>
							<th>NAME</th>
							<th>Payment Status</th>
							<th>Plan</th>
							<th>Reffered By</th>
							<th>Date Joined</th>
							<th>Other Details</th> 
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $no++ }}</td>
									<td>{{ $user->id }}</td>
									<td>{{ $user->fullname() }}</td>
									<td>{{ $user->hasPaid() ? 'Paid' : 'Not Paid'}}</td>
									<td class="text-capitalize">{{ $user->plans ? $user->plans->name : 'No Plan' }}</td>
									<td>{{ $user->hasUpline() ? $user->upline()->fullname() : 'None' }}</td>
									<td>{{ date('D M jS, Y g:ia', strtotime($user->created_at)) }}</td>
									<td><button type="button" class="btn" data-toggle="modal" data-target="#{{ $user->id }}">Details</button></td>
								</tr>
								<div class="modal fade" id="{{ $user->id }}" tabindex="-1" role="dialog" aria-hidden="true">
									<div class="modal-dialog modal-dialog-popin">
										<div class="modal-content">
											<div class="block block-themed block-transparent remove-margin-b">
												<div class="block-header bg-primary-dark">
													<ul class="block-options">
														<li>
															<button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
														</li>
													</ul>
													<h3 class="block-title">{{ $user->fullname() }}</h3>
												</div>
												<div class="block-content">
													<div class="row">
								                        <div class="col-md-6 col-md-offset-3">
								                        	<p>
								                        		Orders: {{$user->orders()->count()}}
								                        	</p>
								                        	<p>
								                        		<a href="{{ route('user.mail', $user->id) }}" class="btn btn-primary">Send Mail</a>
								                        	</p>
								                        </div>	                        	 
							                        </div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-sm btn-default" type="button" data-dismiss="modal">Close</button>
												<button class="btn btn-sm btn-primary" type="button" data-dismiss="modal"><i class="fa fa-check"></i> Ok</button>
											</div>
										</div>
									</div>
								</div>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $users->links() }}
			</div>
		</div>
	</main>

@stop