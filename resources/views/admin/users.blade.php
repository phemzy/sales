@extends('layouts.admin')

@section('content')
		
	<main id="main-container">
		<div class="content content-boxed">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-striped">
						<thead>
							<th>ID</th>
							<th>NAME</th>
							<th>Payment Status</th>
							<th>Reffered By</th>
							<th>Date Joined</th>
							<th>Other Details</th>
						</thead>
						<tbody>
							@foreach($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->fullname() }}</td>
									<td>{{ $user->hasPaid() ? 'Paid' : 'Not Paid'}}</td>
									<td>{{ $user->hasUpline() ? $user->upline()->fullname() : 'None' }}</td>
									<td>{{ date('D M jS, Y g:ia', strtotime($user->created_at)) }}</td>
									<td></td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

@stop