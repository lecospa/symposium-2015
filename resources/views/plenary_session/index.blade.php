@extends('layouts.master')

@section('body')
<div class="page-header">
	<h1>Plenary Session Speakers</h1>
</div>
<div class="alert alert-info" role="alert">You can click speaker’s photo to see his talk title and abstract.</div>
<div class="row">
	@foreach ($plenary_session_people as $person)
		<div class="col-md-3 col-sm-4 col-xs-6">
			<div class="thumbnail" style="height: 250px; position: relative;">
				<a href="{{ action('PlenarySessionController@show', [$person->talks[0]->id]) }}">
					@if ($person->img)
					<img src="{{ asset('uploads/' . $person->img) }}" class="img-responsive img-circle" style="height: 150px;">
					@else
					<div style="height: 150px;"></div>
					@endif
				</a>
				<h4><a href="{{ action('PlenarySessionController@show', [$person->talks[0]->id]) }}">
						{{ $person->first_name}} {{ $person->last_name }}
				</a></h4>
				<p>{{ $person->occupation }}</p>
				<span style="position: absolute; bottom: 0; right: 5px;"><a href="{{ action('PlenarySessionController@show', [$person->talks[0]->id]) }}">» more</a></span>
			</div>
		</div>
	@endforeach
</div>
<script>
document.getElementById('nav-plenary-sessions').classList.add('active');
</script>
@endsection
