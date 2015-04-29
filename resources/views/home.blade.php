@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Hello {{$first_name}}</div>

				<div class="panel-body">
					<div class="dropdown">
  						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
    					Pick a city
    					<span class="caret"></span>
  						</button>
						<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
	    					<li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/city?c=Houston')}}">Houston</a></li>
	    					<li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/city?c=Dallas')}}">Dallas</a></li>
	    					<li role="presentation"><a role="menuitem" tabindex="-1" href="{{url('/city?c=Austin')}}">Austin</a></li>
	  					</ul>
	  				</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
