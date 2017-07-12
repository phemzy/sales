@extends('layouts.admin')

@section('content')

	<main id="main-container">
		<div class="content content-boxed">
			<div class="row">
				<div class="col-md-12">
					<form action="{{ route('mail.all.send') }}" method="post">
						{{ csrf_field() }}
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" name="subject" class="form-control" value="{{ old('subject') }}" placeholder="Email Subject">
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
							</div>
						</div>

						<button class="btn-block btn btn-danger" type="submit">SEND</button>
					</form>
				</div>
			</div>
		</div>
	</main>		

@stop