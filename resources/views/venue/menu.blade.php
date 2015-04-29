@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">

			@if ($error)
			<div class="panel panel-default">
				<div class="panel-heading">Error</div>

				<div class="panel-body">
					{{ $error }}
				</div>
			</div>
			@endif

			<div class="panel panel-default">
				<div class="panel-heading">You Have Not Had These Beers!</div>

				<div class="panel-body">
					<div class="list-group">
						@foreach($unhad_beers as $ub)
  						<a href="#" class="list-group-item active">
    						<h4 class="list-group-item-heading">{{$ub->beer->beer_name}}</h4>
    						<p class="list-group-item-text">{{$ub->brewery->brewery_name}}</p>
  						</a>
  						@endforeach
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">You Have Had These Beers!</div>

				<div class="panel-body">
					<div class="list-group">
						@foreach($had_beers as $ub)
  						<a href="#" class="list-group-item active">
    						<h4 class="list-group-item-heading">{{$ub->beer->beer_name}}</h4>
    						<p class="list-group-item-text">{{$ub->brewery->brewery_name}}</p>
  						</a>
  						@endforeach
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="panel-heading">We couldn't find these beers.</div>

				<div class="panel-body">
					<div class="list-group">
						@foreach($not_found_beers as $ub)
  						<a href="#" class="list-group-item active">
    						<h4 class="list-group-item-heading">{{$ub}}</h4>
  						</a>
  						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
