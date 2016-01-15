@extends('layouts.master')

@section('body')
<div class="page-header">
	<h1>Plenary Session</h1>
</div>
<div class="media">
	<div class="media-left">
		<div style="width: 150px; height: 150px;">
			@if ($talk->person->img)
			<img src="{{ asset('uploads/'. $talk->person->img) }}" class="img-rounded img-responsive">
			@endif
		</div>
	</div>
	<div class="media-body">
		<h2>{{ $talk->person->first_name }} {{ $talk->person->last_name }}</h2>
		<p>{{ $talk->person->email }}</p>
	</div>
</div>
<h2>Title: {{ $talk->title }}</h2>
<h3>Date &amp; Time, Location</h3>
<p>{{ $talk->address_datetime }}, {{ $talk->location }}</p>
<h3>Talk Time</h3>
<p>{{ $talk->talk_time }}</p>
<h3>Talk Abstract</h3>
<p style="white-space: pre-line;">{{ $talk->abstract }}</p>
@if ($talk->slide_file_show == '1')
	<h3>Slide</h3>
	<p><a href="{{ asset('uploads/'.$talk->slide_file) }}">Download</a></p>
@endif

@endsection
