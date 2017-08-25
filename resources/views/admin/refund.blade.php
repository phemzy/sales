@extends('layouts.admin')

@section('content')
	
	<main id="main-container">
		<div class="content content-boxed">
			<div class="row">
				<div class="col-md-12">
					 <table class="table">
						<thead>
						    <tr>
						        <th>Account Name</th>
						        <th>Bank Name</th>
						        <th>Account Number</th>
						        <th>Expected Amount</th>
						        <th>Status</th>
						        <th>Action</th>
						    </tr>
						</thead>
						<tbody>
							@if($user->details)
						    <tr>
						        <td>{{ $user->details->name }}</td>
						        <td>{{ $user->details->bank }}</td>
						        <td>{{ $user->details->account_number }}</td>
						        <td>{{ $user->plans->price }}</td>
						        <td>{{ $user->details->fully_paid ? 'Paid' : 'Not Paid'}}</td>
						        @if($user->details->fully_paid)
						        <td>Paid</td>
						        @else
						        <td><a href="{{ route('refund.mark', $user) }}">Mark as Paid</a></td>
						        @endif
						    </tr>
						    @else
						    <tr>
						    	<td>This user has not filled his/her details yet.</td>
						    </tr>
						    @endif
						</tbody>
					 </table>
				</div>
			</div>
		</div>
	</main>

@stop