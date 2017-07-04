@extends('layouts.admin')

@section('content')

<main id="main-container">
	<div class="content content-boxed">
		<div class="row">
			<div class="col-md-8">
				 <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Proof</th>
                        <th>User</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $p)      
                          <tr class="{{ $p->status == 'successful' ? 'success' : 'danger'}}">
                            <td>{{ $p->transaction_id }}</td>
                            <td>{{ $p->amount }}</td>
                            <td>{{ $p->status }}</td>
                            <td> <a href="{{ Storage::url($p->payment_proof) }}" class="btn btn-primary">View Proof</a> </td>
                            <td>{{ $p->user->fullname() }}</td>
                            <td>
                            	<a href="{{ route('payment.confirm', $p->id) }}" onclick="event.preventDefault(); document.getElementById({{$p->id}}).submit();" class="btn btn-primary">Confirm</a> <a href="" class="btn btn-danger">Cancel</a>
                            	<form method="post" action="{{ route('payment.confirm', $p->id) }}" id="{{ $p->id }}">
                            		{{ csrf_field() }}
                            	</form>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
			</div>
		</div>
	</div>
</main>

@stop