@extends('layouts.master')

@section('body')
<p>To celebrate the centenary of Einstein’s General Relativity, we organize the 2nd LeCosPA International Symposium “Everything about Gravity” on December 14-18, 2015 in Taipei under the auspices of the Division of Astrophysics-Cosmology-Gravity (DACG), Association of Asia-Pacific Physical Societies (AAPPS).</p>
<p>We will examine all aspects of gravity, including but not limited to mathematical structures of GR, big bang and black hole singularities, modified gravity, quantum gravity, emergent gravity, cosmology, dark matter and dark energy, AdS/CFT correspondence, information loss paradox, gravitational waves from big bang and other sources, experimental and observational gravity, etc.</p>
<p>After 100 years of remarkable success of GR, which is a classical theory, and tremendous advancement in our understanding of the other three fundamental interactions through quantum field theory, the development of a quantum theory of gravity has become a major task in physics in the 21st century. This symposium is therefore not just for looking back, but also for looking forward.</p>
<br>
<a href="{{ action('AnnouncementController@january_2016') }}" style="color: white"><div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Announcement - January 1, 2016<span class="pull-right">» more</span></div></a>
<a href="announcement/december_2015.php" style="color: white"><div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Announcement - December 9, 2015<span class="pull-right">» more</span></div></a>
<a href="announcement/november_2015.php" style="color: white"><div class="alert alert-info" role="alert"><span class="glyphicon glyphicon-tag" aria-hidden="true"></span> Announcement - November 23, 2015<span class="pull-right">» more</span></div></a>
<script>
document.getElementById('nav-home').classList.add('active');
</script>
@endsection
