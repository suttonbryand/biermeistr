@extends('app')

@section('content')
<style>
	a.btn-primary{
		margin:2px;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">{{$city}} Venues</div>

				<div class="panel-body">
					@foreach($urls as $url)
						<div>
							<a href='{{url("$url[0]")}}' class="btn btn-primary">{{$url[1]}}</a>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
