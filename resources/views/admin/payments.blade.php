@extends('layouts.admin')

@section('content')

<main id="main-container">
	<div class="content content-boxed">
		<div class="row">
			<div class="col-md-12">
				 <table class="table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Date</th>
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
                            <td>{{ $no++ }}</td>
                            <td style="width: 100px;">{{ $p->created_at->diffForHumans() }}, {{ date('D M jS, Y', strtotime($p->created_at)) }}</td>
                            <td>{{ $p->transaction_id }}</td>
                            <td>{{ $p->amount }}</td>
                            <td>{{ $p->status }}</td>
                            <td> <a href="{{ Storage::url($p->payment_proof) }}" class="btn btn-primary">View Proof</a> </td>
                            <td>{{ $p->user->fullname() }}</td>
                            <td>
                                @if(!$p->isConfirmed() or $p->isCancelled())
                                    <a href="{{ route('payment.confirm', $p->id) }}" onclick="event.preventDefault(); document.getElementById({{$p->id}}).submit();" class="btn btn-primary">Confirm</a>
                                    <form method="post" action="{{ route('payment.confirm', $p->id) }}" id="{{ $p->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                @else
                                    <a onclick="event.preventDefault(); document.getElementById({{$p->id}}).submit();" class="btn btn-danger" href="{{ route('payment.cancel', $p->id) }}">Cancel</a>
                                    <form method="post" action="{{ route('payment.cancel', $p->id) }}" id="{{ $p->id }}">
                                        {{ csrf_field() }}
                                    </form>
                                @endif                            	
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