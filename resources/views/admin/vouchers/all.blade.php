@extends('layouts.admin')

@section('content')

<main id="main-container">
	<div class="content content-boxed">
		<div class="row">
			<div class="col-md-12">
				 <table class="table">
                    <thead>
                    	<th>Code</th>
                    	<th>Amount</th>
                    	<th>User</th>
                    	<th>State</th>
                    	<th>Action</th>
                    </thead>
                    <tbody>
                    	@foreach($vouchers as $v)
						
							<tr>
								<td>{{$v->name}}</td>
								<td>{{ $v->amount }}</td>
								<td>{{ $v->owner->fullname() }}</td>
								<td>{{ $v->isActive() ? 'Active' : 'Not Active' }}</td>
								<td><a href="{{ route('voucher.revert', $v) }}" class="btn btn-primary btn-xs">Revert</a></td>
							</tr>

                    	@endforeach
                    </tbody>
                  </table>
			</div>
		</div>
	</div>
</main>

@stop