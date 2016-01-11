@extends('layouts.master')

@section('body')
<p>Dear all,</p>
<p>Thank you for participating in the Second LeCosPA Symposium “Everything About Gravity” and we hope you had a good time at LeCosPA, Taiwan!</p>
<p>The symposium organizers would like to remind you in regards to your papers submission for the proceeding.</p>
<ol>
	<li>Please do submit your paper before January 31, 2016 to <a href="mailto:fredericawang@phys.ntu.edu.tw">fredericawang@phys.ntu.edu.tw</a>.</li>
	<li>Page limit:
		<ul>
			<li>Plenary sessions: 10 pages for each speaker.</li>
			<li>Parallel sessions: 6 pages for each speaker.</li>
			<li>Conclusion of the parallel sessions – 4 pages summery for each session.</li>
		</ul>
	</li>
	<li>Template requirement:<br>Check <a href="{{ url('publications.php') }}">here</a>.</li>
	<li>Your mailing address:<br>Each participant will get one hard copy of the symposium proceeding. Please provide your mailing address to <a href="mailto:fredericawang@phys.ntu.edu.tw">fredericawang@phys.ntu.edu.tw</a> so we can mail it to you.</li>
</ol>
<p>Please note that all papers by the plenary speakers will be additionally published as refereed papers in a special issue of International Journal of Modern Physics D (IJMPD).</p>
<p>Our symposium videos for plenary sessions are now available at <a href="{{ url('conference_videos.php') }}">here</a>.</p>
<p>Our symposium photos are now available at <a href="http://lecospa.ntu.edu.tw/news-and-activities/photo-gallery/everything-about-gravity/">here</a>.</p>
<p>Thank You &amp; Happy New Year!</p>
<p>2<sup>nd</sup> LeCosPA Symposium Organizing Team</p>
<script>
document.getElementById('nav-home').classList.add('active');
</script>
@endsection
