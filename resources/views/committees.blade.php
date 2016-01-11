@extends('layouts.master')

@section('body')
<div class="page-header">
	<h1>International Advisory Committee</h1>
</div>
<div class="row">
	@foreach ($committees['IACCHAIR']->people as $person)
	<div class="col-md-3">
		<div class="thumbnail" style="height: 220px;">
			@if ($person->img)
			<img src="{{ asset('uploads/' . $person->img) }}" class="img-responsive img-circle" style="height: 150px;">
			@endif
			<h4>{{ $person->first_name }} {{ $person->last_name }} <span class="label label-primary">Chair</span></h4>
			<small>{{ $person->email }}</small>
		</div>
	</div>
	@endforeach
	@foreach ($committees['IAC']->people as $person)
	<div class="col-md-3">
		<div class="thumbnail" style="height: 220px;">
			<img src="{{ asset('uploads/' . $person->img) }}" class="img-responsive img-circle" style="height: 150px;">
			<h4>{{ $person->first_name }} {{ $person->last_name }}</h4>
			<small>{{ $person->email }}</small>
		</div>
	</div>
	@endforeach
</div>

<div class="page-header">
	<h1>Local Organizing Committee</h1>
</div>
<div class="row">
	@foreach ($committees['LOCCHAIR']->people as $person)
	<div class="col-md-3">
		<div class="thumbnail" style="height: 220px;">
			@if ($person->img)
			<img src="{{ asset('uploads/' . $person->img) }}" class="img-responsive img-circle" style="height: 150px;">
			@endif
			<h4>{{ $person->first_name }} {{ $person->last_name }} <span class="label label-primary">Chair</span></h4>
			<small>{{ $person->email }}</small>
		</div>
	</div>
	@endforeach
	@foreach ($committees['LOC']->people as $person)
	<div class="col-md-3">
		<div class="thumbnail" style="height: 220px;">
			<img src="{{ asset('uploads/' . $person->img) }}" class="img-responsive img-circle" style="height: 150px;">
			<h4>{{ $person->first_name }} {{ $person->last_name }}</h4>
			<small>{{ $person->email }}</small>
		</div>
	</div>
	@endforeach
</div>
<script>
document.getElementById('nav-committees').classList.add('active');
</script>
@endsection
