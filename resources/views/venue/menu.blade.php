@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">You Have Not Had These Beers!</div>

				<div class="panel-body">
					<div class="list-group">
						@foreach($unhad_beers as $ub)
  						<a href="#" class="list-group-item active">
    						<h4 class="list-group-item-heading">{{$ub->beer_name}}</h4>
    						<p class="list-group-item-text">{{$ub->brewery->brewery_name}}</p>
  						</a>
  						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
