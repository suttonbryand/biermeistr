@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
					<a class="btn btn-primary" href="{{ url('/login') }}">Login With Untappd</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
